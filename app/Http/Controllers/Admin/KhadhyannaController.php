<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Khadhyanna;
use App\Models\Udhyog;
use App\Models\Unit;
use App\Models\InventoryProduct;
use App\Models\SeedBatch;
use Illuminate\Support\Facades\DB;
class KhadhyannaController extends DM_BaseController
{
    protected $panel = 'Dealer';
    protected $base_route = 'admin.udhyog.hybridbiu.inventory.khadhyanna';
    protected $view_path = 'admin.khadhyanna';
    protected $model;
    protected $table;

    public function __construct(Khadhyanna $model)
    {
        $this->model = $model;
        // $this->middleware('permission:view worker')->only(['index', 'show']);
        // $this->middleware('permission:create worker')->only(['create', 'store']);
        // $this->middleware('permission:edit worker')->only(['edit', 'update']);
        // $this->middleware('permission:delete worker')->only('destroy');
    }

    public function index(Request $request)
    {
        $udhyog = Udhyog::where('name', 'hybrid biu')->first();
        // dd($udhyog);
        if(auth()->user()->udhyog_id != $udhyog->id || auth()->user()->hasRole('admin') || auth()->user()->super_role == 1){
            $data['rows'] =  $this->model->getData();
            return view(parent::loadView($this->view_path . '.index'), compact('data'));

        }else{
            abort(404, "access denied");
        }
    }
    public function create()
    {
        $data['units'] = Unit::get();
        $udhyog = Udhyog::where('name', 'hybrid biu')->first();
        $data['seed_batch'] = SeedBatch::get();
        $data['seed'] = InventoryProduct::where('udhyog_id', $udhyog->id)->get();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        try {
            DB::beginTransaction();
            $batch = SeedBatch::where('batch_no', $request->production_batch_id)->first();
            $product = InventoryProduct::where('id', $request->seed_id)->first();
            if($batch && $product){
                $khadhaynna = $this->model->create([
                    'inventory_product_id' => $request->seed_id,
                    'seed_batch_id'=>$batch->id,
                    'unit_id'=>$request->unit_id,
                    'quantity'=>$request->stock_quantity,
                    'stock_quantity'=>$request->stock_quantity,
                ]);
                $batch->decrement('stock_quantity', $request->stock_quantity);
                $product->decrement('stock_quantity', $request->stock_quantity);
                DB::commit();
                session()->flash('alert-success', 'खाद्यान्न सिर्जना गरियो ।');
                return redirect()->route($this->base_route.'.index');
            }else{
                session()->flash('alert-warning', 'डिलर सिर्जना हुन सकेन ।');
                return redirect()->back();
            }

        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            session()->flash('alert-danger', 'डिलर सिर्जना हुन सकेन ।');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data['row'] = $this->model::where('id', '=', $id)->firstOrFail();
        $data['units'] = Unit::get();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();

            // Fetch khadhaynna by ID
            $khadhaynna = $this->model->find($id);
            if (!$khadhaynna) {
                session()->flash('alert-warning', 'खाद्यान्न फेला परेन।');
                return redirect()->back();
            }

            // Fetch batch and product
            $batch = SeedBatch::where('batch_no', $request->batch_no)->first();
            $product = InventoryProduct::where('id', $request->seed_id)->first();

            if ($batch && $product) {
                // Calculate quantity difference
                $updateQuantity = $request->stock_quantity - $khadhaynna->quantity;

                // Update khadhaynna
                $khadhaynna->update([
                    'unit_id' => $request->unit_id,
                    'quantity' => $request->quantity,
                    'stock_quantity' => $request->quantity,
                ]);

                // Adjust batch and product stock quantities
                if ($updateQuantity > 0) {
                    $batch->increment('stock_quantity', $updateQuantity);
                    $product->increment('stock_quantity', $updateQuantity);
                } elseif ($updateQuantity < 0) {
                    $batch->decrement('stock_quantity', abs($updateQuantity));
                    $product->decrement('stock_quantity', abs($updateQuantity));
                }

                DB::commit();
                session()->flash('alert-success', 'खाद्यान्न सिर्जना गरियो।');
                return redirect()->route($this->base_route.'.index');
            } else {
                session()->flash('alert-warning', 'डिलर सिर्जना हुन सकेन।');
                return redirect()->back();
            }

        } catch (\Throwable $th) {
            DB::rollback();
            session()->flash('alert-danger', 'डिलर सिर्जना हुन सकेन।');
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }

    }

    public function view($id){
        $dealer = Dealer::findOrFail($id);
        $data['rows'] = $dealer->account;
        // dd($data);
        $data['dealer'] = $dealer;
        return view(parent::loadView($this->view_path.".view"), compact('data'));
    }

    function orders(Request $request, $id){
        // dd($id);
        $data['dealer'] = Dealer::findOrFail($id);
        // dd($data);
        $data['products'] = null;
        $data['units'] = Unit::get();
        if($request->has('udhyog')){
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();
            if($udhyog){
                $data['udhyog'] = $udhyog;
                // $this->base_route = 'admin.udhyog.achar.inventory.sales_orders';
                $data['products'] = InventoryProduct::where('udhyog_id', $udhyog->id)->get();
                $data['dealers'] = Dealer::where('udhyog_id', $udhyog->id)->get();
            }else{
                session()->flash('alert-success', 'उद्योग फेला परेन ।');
                return back();
            }
        }
        $currentDate = date('Y-m-d');
        //conver English date to Nepali date   // Thaman 2078-01-01
        $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
        return view(parent::loadView($this->view_path.'.orders'),compact('data'));
    }

    function inventory(){
        $data['rows'] = $this->model->where('stock_quantity', '>', 0)->get();
        return view(parent::loadView($this->view_path.'.inventory'), compact('data'));
    }
    public function destroy(Request $request, $id)
    {
        try {
            // Find the data by ID or fail
            $data = $this->model->findOrFail($id);

            // Find the batch and product associated with the data
            $batch = SeedBatch::where('id', $data->seed_batch_id)->first();
            $product = InventoryProduct::where('id', $data->seed_id)->first();

            if ($batch) {
                // Update the batch stock quantity
                $batch->stock_quantity += $data->quantity;
                $batch->save();
            }

            if ($product) {
                // Update the product stock quantity
                $product->stock_quantity += $data->quantity;
                $product->save();
            }

            // Delete the data
            $data->delete();

            // Set success message and redirect
            $request->session()->flash('success_message', $this->panel . ' deleted successfully.');
            return response($data);

        } catch (\Exception $e) {
            // Handle the exception and set error message
            $request->session()->flash('error_message', $this->panel . ' could not be deleted.');
            return response($data);
        }
    }
}

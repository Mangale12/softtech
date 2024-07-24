<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\VoucherDrCr;
use App\Models\Udhyog;
use App\Models\FinanceTitle;
use Illuminate\Support\Str;
use App\Models\Fiscal;
use App\Models\Node;
use Illuminate\Support\Facades\Log;

class VoucherController extends DM_BaseController
{
    protected $panel = 'Voucher';
    protected $base_route = 'admin.voucher';
    protected $view_path = 'admin.voucher';
    protected $model;
    public function __construct(Voucher $model)
    {
        $this->model = $model;
        $this->middleware('permission:view Voucher')->only(['index', 'show', 'voucher']);
        $this->middleware('permission:create Voucher')->only(['create']);
        $this->middleware('permission:edit Voucher')->only(['edit', 'update']);
        $this->middleware('permission:delete Voucher')->only('destroy');
    }
    public function index(Request $request)
    {
        $this->panel = "Fianance";
        $data['udhyog'] = Udhyog::where('name', $request->udhyog)->firstOrFail();
        $data['vouchers'] = Voucher::with('voucherType')
                            ->where('udhyog_id', $data['udhyog']->id)
                            ->get();
        $data['lekha_shirsak'] = Voucher::with('lekhaShirsak')
                                    ->get();
        $this->base_route = 'admin.udhyog.'.Str::lower(str_replace(' ', '', $data['udhyog']->name)).'.fianance';
        return view(parent::loadView($this->view_path . '.index'),compact('data'));
    }

    function voucher(Request $request){
        // try {
        //     // Fetch all income and expense nodes
        //     $udhyog = Udhyog::where('name', $request->udhyog)->firstOrFail();
        //     $data['fiscal'] = Fiscal::all();


        //     $rootNodes = Node::whereNull('parent_id')
        //                  ->where('type', 'income')
        //                  ->get();

        //     // Debug: Log fetched root nodes
        //     Log::info('Fetched Root Nodes:', $rootNodes->toArray());

        //     // Initialize collections to hold leaf node IDs
        //     $incomeLeafNodeIds = collect();
        //     $expenseLeafNodeIds = collect();

        //     // Loop through each root node to get its leaf nodes
        //     foreach ($rootNodes as $rootNode) {
        //         // Get all descendants of the root node
        //         $descendants = $rootNode->descendants();

        //         // Filter descendants to get only leaf nodes and collect their IDs
        //         $incomeLeafNodeIds = $incomeLeafNodeIds->merge(
        //             $descendants->filter(function ($node) {
        //                 return $node->isLeaf();
        //             })->pluck('id')
        //         );
        //     }

        //     // Fetch all root nodes of type 'expense'
        //     $rootNodes = Node::whereNull('parent_id')
        //                     ->where('type', 'expence')
        //                     ->get();

        //     // Debug: Log fetched root nodes
        //     Log::info('Fetched Expense Root Nodes:', $rootNodes->toArray());

        //     // Loop through each root node to get its leaf nodes
        //     foreach ($rootNodes as $rootNode) {
        //         // Get all descendants of the root node
        //         $descendants = $rootNode->descendants();

        //         // Filter descendants to get only leaf nodes and collect their IDs
        //         $expenseLeafNodeIds = $expenseLeafNodeIds->merge(
        //             $descendants->filter(function ($node) {
        //                 return $node->isLeaf();
        //             })->pluck('id')
        //         );
        //     }
        //     // Debug: Log leaf node IDs
        //     Log::info('Income Leaf Node IDs:', $incomeLeafNodeIds->toArray());
        //     Log::info('Expense Leaf Node IDs:', $expenseLeafNodeIds->toArray());
        //     // dd($incomeLeafNodeIds);
        //     // Get the titles from VoucherDrCr based on leaf node IDs
        //     $data['kharcha'] = VoucherDrCr::whereIn('title', $incomeLeafNodeIds)
        //                                 ->where('dr', '>', 0)
        //                                 ->get();
        //     $data['kharcha_sum'] = VoucherDrCr::whereIn('title', $incomeLeafNodeIds)
        //                                     ->where('dr', '>', 0)
        //                                     ->sum('dr');

        //     $data['amdani'] = VoucherDrCr::whereIn('title', $expenseLeafNodeIds)
        //                                 ->where('dr', '>', 0)
        //                                 ->get();

        //     $data['amdani_sum'] = VoucherDrCr::whereIn('title', $expenseLeafNodeIds)
        //                                     ->where('dr', '>', 0)
        //                                     ->sum('dr');

        //     // $this->base_route = 'admin.udhyog.' . Str::lower(str_replace(' ', '', $data['udhyog']->name)) . '.finance';
        //     return view(parent::LoadView($this->view_path . '.voucher'),compact('data'));

        // } catch (\Exception $e) {
        //     Log::error('Error fetching finance data: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
        //     return response()->json(['error' => 'Failed to fetch finance data'], 500);
        // }

        // $this->panel = "Voucher";
        // $data['udhyog'] = Udhyog::where('name', $request->udhyog)->firstOrFail();
        // $data['fiscal'] = Fiscal::all();

        // $baseQuery = VoucherDrCr::where('udhyog_id', $data['udhyog']->id)
        //                         ->where('dr', '>', 0);

        // if ($request->has('fiscal') && $request->get('fiscal')) {
        //     $fiscalId = $request->get('fiscal');
        //     $baseQuery->where('fiscal_id', $fiscalId);
        // }

        // $data['kharcha'] = (clone $baseQuery)->where('voucher_type', '1')->get();
        // $data['kharcha_sum'] = (clone $baseQuery)->where('voucher_type', '1')->sum('dr');

        // $data['amdani'] = (clone $baseQuery)->where('voucher_type', '2')->get();
        // $data['amdani_sum'] = (clone $baseQuery)->where('voucher_type', '2')->sum('dr');
        // $this->base_route = 'admin.udhyog.'.Str::lower(str_replace(' ', '', $data['udhyog']->name)).'.fianance';


        try {
            $rootNodes = Node::whereNull('parent_id')->whereIn('type', ['expence', 'income'])->get();
            $nodeHierarchy = [];

            foreach ($rootNodes as $rootNode) {
                $descendants = $rootNode->descendants();
                $leafNodes = $descendants->filter(fn($node) => $node->isLeaf());

                foreach ($leafNodes as $leafNode) {
                    $vouchers = VoucherDrCr::where('title', $leafNode->id)->get();
                    if ($vouchers->isNotEmpty()) {
                        $totalDr = $vouchers->sum('dr');
                        $hierarchy = $leafNode->ancestors()->reverse()->push($leafNode);

                        $nodeHierarchy[$rootNode->type][] = [
                            'hierarchy' => $hierarchy,
                            'total_dr' => $totalDr
                        ];
                    }
                }
            }

            // Convert to collections
            foreach ($nodeHierarchy as $type => &$items) {
                $items = collect($items);
            }

            $data['node_hierarchy'] = $nodeHierarchy;
            return view(parent::LoadView($this->view_path . '.voucher'),compact('data'));

            return view('admin.voucher.balance_sheet', compact('data'));

        } catch (\Exception $e) {
            Log::error('Error fetching finance data: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
            return response()->json(['error' => 'Failed to fetch finance data'], 500);
        }

        return view(parent::LoadView($this->view_path . '.voucher'),compact('data'));
    }

    function balancesheet(Request $request){
        // try {
        //     // Fetch all income and expense nodes
        //     $udhyog = Udhyog::where('name', $request->udhyog)->firstOrFail();
        //     $data['fiscal'] = Fiscal::all();


        //     $rootNodes = Node::whereNull('parent_id')
        //                  ->where('type', 'asset')
        //                  ->get();

        //     // Initialize collections to hold leaf node IDs
        //     $assetLeafNodeIds = collect();
        //     $liabilitiesLeafNodeIds = collect();
        //     $asssetdescendants = collect();
        //     // Loop through each root node to get its leaf nodes
        //     foreach ($rootNodes as $rootNode) {
        //         // Get all descendants of the root node
        //         $descendants = $rootNode->descendants();
        //         // Add the root node to the descendants collection
        //         $descendants->prepend($rootNode);

        //         // Merge all descendants into the asset descendants collection
        //         $asssetdescendants = $asssetdescendants->merge($descendants);
        //         // Filter descendants to get only leaf nodes and collect their IDs
        //         $assetLeafNodeIds = $assetLeafNodeIds->merge(
        //             $descendants->filter(function ($node) {
        //                 return $node->isLeaf();
        //             })->pluck('id')
        //         );
        //     }
        //     // dd($asssetdescendants);

        //     // Fetch all root nodes of type 'expense'
        //     $rootNodes = Node::whereNull('parent_id')
        //                     ->where('type', 'liabilities')
        //                     ->get();

        //     // Debug: Log fetched root nodes
        //     Log::info('Fetched Expense Root Nodes:', $rootNodes->toArray());

        //     // Loop through each root node to get its leaf nodes
        //     foreach ($rootNodes as $rootNode) {
        //         // Get all descendants of the root node
        //         $descendants = $rootNode->descendants();

        //         // Filter descendants to get only leaf nodes and collect their IDs
        //         $liabilitiesLeafNodeIds = $liabilitiesLeafNodeIds->merge(
        //             $descendants->filter(function ($node) {
        //                 return $node->isLeaf();
        //             })->pluck('id')
        //         );
        //     }
        //     // Debug: Log leaf node IDs
        //     Log::info('Income Leaf Node IDs:', $assetLeafNodeIds->toArray());
        //     Log::info('Expense Leaf Node IDs:', $liabilitiesLeafNodeIds->toArray());
        //     // dd($incomeLeafNodeIds);
        //     // Get the titles from VoucherDrCr based on leaf node IDs
        //     $data['assets'] = VoucherDrCr::whereIn('title', $assetLeafNodeIds)
        //                                 ->where('dr', '>', 0)
        //                                 ->get();

        //     $data['assets_sum'] = VoucherDrCr::whereIn('title', $assetLeafNodeIds)
        //                                     ->where('dr', '>', 0)
        //                                     ->sum('dr');

        //     $data['liabilities'] = VoucherDrCr::whereIn('title', $liabilitiesLeafNodeIds)
        //                                 ->where('dr', '>', 0)
        //                                 ->get();

        //     $data['liabilities_sum'] = VoucherDrCr::whereIn('title', $liabilitiesLeafNodeIds)
        //                                     ->where('dr', '>', 0)
        //                                     ->sum('dr');
        //     return view(parent::LoadView($this->view_path . '.balance_sheet'),compact('data'));

        // } catch (\Exception $e) {
        //     Log::error('Error fetching finance data: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
        //     return response()->json(['error' => 'Failed to fetch finance data'], 500);
        // }

        // try {
        //     // // Fetch root nodes of types 'asset' and 'liabilities'
        //     // $rootNodes = Node::whereNull('parent_id')->whereIn('type', ['asset', 'liabilities'])->get();

        //     // // Initialize collections to hold node IDs and hierarchy
        //     // $assetLeafNodeIds = collect();
        //     // $liabilitiesLeafNodeIds = collect();
        //     // $nodeHierarchy = [];

        //     // // Loop through each root node to get its leaf nodes and build the hierarchy
        //     // foreach ($rootNodes as $rootNode) {
        //     //     // Get all descendants of the root node
        //     //     $descendants = $rootNode->descendants();

        //     //     // Filter descendants to get only leaf nodes and collect their IDs
        //     //     $leafNodes = $descendants->filter(function ($node) {
        //     //         return $node->isLeaf();
        //     //     });

        //     //     if ($rootNode->type === 'asset') {
        //     //         $assetLeafNodeIds = $assetLeafNodeIds->merge($leafNodes->pluck('id'));
        //     //     } else {
        //     //         $liabilitiesLeafNodeIds = $liabilitiesLeafNodeIds->merge($leafNodes->pluck('id'));
        //     //     }

        //     //     // Build hierarchy for each leaf node
        //     //     foreach ($leafNodes as $leafNode) {
        //     //         $hierarchy = $leafNode->ancestors()->reverse()->push($leafNode);
        //     //         $nodeHierarchy[$rootNode->type][] = $hierarchy;
        //     //     }
        //     // }

        //     // // Debug: Log leaf node IDs and hierarchy
        //     // Log::info('Asset Leaf Node IDs:', $assetLeafNodeIds->toArray());
        //     // Log::info('Liabilities Leaf Node IDs:', $liabilitiesLeafNodeIds->toArray());
        //     // Log::info('Node Hierarchy:', $nodeHierarchy);

        //     // // Get the titles from VoucherDrCr based on leaf node IDs
        //     // $data['assets'] = VoucherDrCr::whereIn('title', $assetLeafNodeIds)->where('dr', '>', 0)->get();
        //     // $data['assets_sum'] = VoucherDrCr::whereIn('title', $assetLeafNodeIds)->where('dr', '>', 0)->sum('dr');
        //     // $data['liabilities'] = VoucherDrCr::whereIn('title', $liabilitiesLeafNodeIds)->where('dr', '>', 0)->get();
        //     // $data['liabilities_sum'] = VoucherDrCr::whereIn('title', $liabilitiesLeafNodeIds)->where('dr', '>', 0)->sum('dr');

        //     // // Pass the node hierarchy to the view
        //     // $data['node_hierarchy'] = $nodeHierarchy;


        //     $rootNodes = Node::whereNull('parent_id')->whereIn('type', ['asset', 'liabilities'])->get();

        //     // Initialize collections to hold node IDs and hierarchy
        //     $nodeHierarchy = [];
        //     $assetLeafNodeIds = collect();
        //     $liabilitiesLeafNodeIds = collect();

        //     // Loop through each root node to get its leaf nodes and build the hierarchy
        //     foreach ($rootNodes as $rootNode) {
        //         // Get all descendants of the root node
        //         $descendants = $rootNode->descendants();

        //         // Filter descendants to get only leaf nodes and collect their IDs
        //         $leafNodes = $descendants->filter(function ($node) {
        //             return $node->isLeaf();
        //         });

        //         foreach ($leafNodes as $leafNode) {
        //             $voucherDrCrExists = VoucherDrCr::where('title', $leafNode->id)->exists();
        //             if ($voucherDrCrExists) {
        //                 $hierarchy = $leafNode->ancestors()->reverse()->push($leafNode);
        //                 $nodeHierarchy[$rootNode->type][] = $hierarchy;

        //                 if ($rootNode->type === 'asset') {
        //                     $assetLeafNodeIds->push($leafNode->id);
        //                 } else {
        //                     $liabilitiesLeafNodeIds->push($leafNode->id);
        //                 }
        //             }
        //         }
        //     }

        //     // Debug: Log leaf node IDs and hierarchy
        //     Log::info('Asset Leaf Node IDs:', $assetLeafNodeIds->toArray());
        //     Log::info('Liabilities Leaf Node IDs:', $liabilitiesLeafNodeIds->toArray());
        //     Log::info('Node Hierarchy:', $nodeHierarchy);

        //     // Get the titles from VoucherDrCr based on leaf node IDs
        //     // $data['assets'] = VoucherDrCr::whereIn('title', $assetLeafNodeIds)
        //     //                             ->where('dr', '>', 0)
        //     //                             ->get();
        //     $data['assets_sum'] = VoucherDrCr::whereIn('title', $assetLeafNodeIds)
        //                                     ->where('dr', '>', 0)
        //                                     ->sum('dr');

        //     // $data['liabilities'] = VoucherDrCr::whereIn('title', $liabilitiesLeafNodeIds)
        //     //                                 ->where('dr', '>', 0)
        //     //                                 ->get();
        //     $data['liabilities_sum'] = VoucherDrCr::whereIn('title', $liabilitiesLeafNodeIds)
        //                                         ->where('dr', '>', 0)
        //                                         ->sum('dr');

        //     // Pass the node hierarchy to the view
        //     $data['node_hierarchy'] = $nodeHierarchy;

        //     // dd($data);
        //     return view(parent::LoadView($this->view_path . '.balance_sheet'),compact('data'));
        // } catch (\Exception $e) {
        //     Log::error('Error fetching finance data: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
        //     return response()->json(['error' => 'Failed to fetch finance data'], 500);
        // }

        // try {
        //     // Fetch root nodes of types 'asset' and 'liabilities'
        //     // $rootNodes = Node::whereNull('parent_id')->whereIn('type', ['asset', 'liabilities'])->get();

        //     // // Initialize collections to hold node IDs and hierarchy
        //     // $nodeHierarchy = [];
        //     // $assetLeafNodeIds = collect();
        //     // $liabilitiesLeafNodeIds = collect();

        //     // // Loop through each root node to get its leaf nodes and build the hierarchy
        //     // foreach ($rootNodes as $rootNode) {
        //     //     // Get all descendants of the root node
        //     //     $descendants = $rootNode->descendants();

        //     //     // Filter descendants to get only leaf nodes and collect their IDs
        //     //     $leafNodes = $descendants->filter(function ($node) {
        //     //         return $node->isLeaf();
        //     //     });

        //     //     foreach ($leafNodes as $leafNode) {
        //     //         $voucherDrCr = VoucherDrCr::where('title', $leafNode->id)->first();
        //     //         if ($voucherDrCr) {
        //     //             // Build hierarchy for each leaf node
        //     //             $hierarchy = $leafNode->ancestors()->reverse()->push($leafNode);
        //     //             $nodeHierarchy[$rootNode->type][] = [
        //     //                 'hierarchy' => $hierarchy,
        //     //                 'voucher' => $voucherDrCr
        //     //             ];

        //     //             if ($rootNode->type === 'asset') {
        //     //                 $assetLeafNodeIds->push($leafNode->id);
        //     //             } else {
        //     //                 $liabilitiesLeafNodeIds->push($leafNode->id);
        //     //             }
        //     //         }
        //     //     }
        //     // }

        //     // // Debug: Log leaf node IDs and hierarchy
        //     // Log::info('Asset Leaf Node IDs:', $assetLeafNodeIds->toArray());
        //     // Log::info('Liabilities Leaf Node IDs:', $liabilitiesLeafNodeIds->toArray());
        //     // Log::info('Node Hierarchy:', $nodeHierarchy);

        //     // // Calculate totals
        //     // $data['assets_sum'] = VoucherDrCr::whereIn('title', $assetLeafNodeIds)
        //     //                                 ->where('dr', '>', 0)
        //     //                                 ->sum('dr');

        //     // $data['liabilities_sum'] = VoucherDrCr::whereIn('title', $liabilitiesLeafNodeIds)
        //     //                                      ->where('dr', '>', 0)
        //     //                                      ->sum('dr');

        //     // // Pass the node hierarchy to the view
        //     // $data['node_hierarchy'] = $nodeHierarchy;


        //     $rootNodes = Node::whereNull('parent_id')->whereIn('type', ['asset', 'liabilities'])->get();

        //     // Initialize collections to hold node IDs and hierarchy
        //     $nodeHierarchy = [];
        //     $assetLeafNodeIds = collect();
        //     $liabilitiesLeafNodeIds = collect();

        //     // Loop through each root node to get its leaf nodes and build the hierarchy
        //     foreach ($rootNodes as $rootNode) {
        //         // Get all descendants of the root node
        //         $descendants = $rootNode->descendants();

        //         // Filter descendants to get only leaf nodes and collect their IDs
        //         $leafNodes = $descendants->filter(function ($node) {
        //             return $node->isLeaf();
        //         });

        //         foreach ($leafNodes as $leafNode) {
        //             // Fetch all VoucherDrCr entries for the leafNode ID
        //             $vouchers = VoucherDrCr::where('title', $leafNode->id)->get();

        //             if ($vouchers->isNotEmpty()) {
        //                 // Sum the 'dr' amounts for the leafNode
        //                 $totalDr = $vouchers->sum('dr');

        //                 // Build hierarchy for each leaf node
        //                 $hierarchy = $leafNode->ancestors()->reverse()->push($leafNode);
        //                 $nodeHierarchy[$rootNode->type][] = [
        //                     'hierarchy' => $hierarchy,
        //                     'total_dr' => $totalDr
        //                 ];

        //                 if ($rootNode->type === 'asset') {
        //                     $assetLeafNodeIds->push($leafNode->id);
        //                 } else {
        //                     $liabilitiesLeafNodeIds->push($leafNode->id);
        //                 }
        //             }
        //         }
        //     }

        //     // Calculate totals
        //     $data['assets_sum'] = VoucherDrCr::whereIn('title', $assetLeafNodeIds)
        //                                     ->where('dr', '>', 0)
        //                                     ->sum('dr');

        //     $data['liabilities_sum'] = VoucherDrCr::whereIn('title', $liabilitiesLeafNodeIds)
        //                                          ->where('dr', '>', 0)
        //                                          ->sum('dr');

        //     // Pass the node hierarchy to the view
        //     $data['node_hierarchy'] = $nodeHierarchy;

        //     return view(parent::LoadView($this->view_path . '.balance_sheet'),compact('data'));
        // } catch (\Exception $e) {
        //     Log::error('Error fetching finance data: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
        //     return response()->json(['error' => 'Failed to fetch finance data'], 500);
        // }


        // try {
        //     // Fetch root nodes of types 'asset' and 'liabilities'
        //     $rootNodes = Node::whereNull('parent_id')->whereIn('type', ['asset', 'liabilities'])->get();

        //     // Initialize collections to hold node IDs and hierarchy
        //     $nodeHierarchy = [];
        //     $assetLeafNodeIds = collect();
        //     $liabilitiesLeafNodeIds = collect();

        //     // Loop through each root node to get its leaf nodes and build the hierarchy
        //     foreach ($rootNodes as $rootNode) {
        //         // Get all descendants of the root node
        //         $descendants = $rootNode->descendants();

        //         // Filter descendants to get only leaf nodes and collect their IDs
        //         $leafNodes = $descendants->filter(function ($node) {
        //             return $node->isLeaf();
        //         });

        //         foreach ($leafNodes as $leafNode) {
        //             // Fetch all VoucherDrCr entries for the leafNode ID
        //             $vouchers = VoucherDrCr::where('title', $leafNode->id)->get();

        //             if ($vouchers->isNotEmpty()) {
        //                 // Sum the 'dr' amounts for the leafNode
        //                 $totalDr = $vouchers->sum('dr');

        //                 // Build hierarchy for each leaf node
        //                 $hierarchy = $leafNode->ancestors()->reverse()->push($leafNode);

        //                 // Group nodes by ancestor path
        //                 $pathKey = $hierarchy->pluck('id')->implode('-');
        //                 if (!isset($nodeHierarchy[$rootNode->type][$pathKey])) {
        //                     $nodeHierarchy[$rootNode->type][$pathKey] = [
        //                         'hierarchy' => $hierarchy,
        //                         'total_dr' => 0
        //                     ];
        //                 }

        //                 $nodeHierarchy[$rootNode->type][$pathKey]['total_dr'] += $totalDr;

        //                 if ($rootNode->type === 'asset') {
        //                     $assetLeafNodeIds->push($leafNode->id);
        //                 } else {
        //                     $liabilitiesLeafNodeIds->push($leafNode->id);
        //                 }
        //             }
        //         }
        //     }

        //     // Calculate totals
        //     $data['assets_sum'] = VoucherDrCr::whereIn('title', $assetLeafNodeIds)
        //                                     ->where('dr', '>', 0)
        //                                     ->sum('dr');

        //     $data['liabilities_sum'] = VoucherDrCr::whereIn('title', $liabilitiesLeafNodeIds)
        //                                          ->where('dr', '>', 0)
        //                                          ->sum('dr');

        //     // Pass the node hierarchy to the view
        //     $data['node_hierarchy'] = $nodeHierarchy;
        //     return view(parent::LoadView($this->view_path . '.balance_sheet'),compact('data'));
        //     return view('admin.voucher.balance_sheet', compact('data'));
        // } catch (\Exception $e) {
        //     Log::error('Error fetching finance data: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
        //     return response()->json(['error' => 'Failed to fetch finance data'], 500);
        // }


        // try {
        //     // Fetch root nodes of types 'asset' and 'liabilities'
        //     $rootNodes = Node::whereNull('parent_id')->whereIn('type', ['asset', 'liabilities'])->get();

        //     // Initialize collections to hold node hierarchy
        //     $nodeHierarchy = [];

        //     // Loop through each root node to get its descendants and build the hierarchy
        //     foreach ($rootNodes as $rootNode) {
        //         // Get all descendants of the root node
        //         $descendants = $rootNode->descendants();

        //         // Filter descendants to get only leaf nodes
        //         $leafNodes = $descendants->filter(function ($node) {
        //             return $node->isLeaf();
        //         });

        //         foreach ($leafNodes as $leafNode) {
        //             // Fetch all VoucherDrCr entries for the leafNode ID
        //             $vouchers = VoucherDrCr::where('title', $leafNode->id)->get();

        //             if ($vouchers->isNotEmpty()) {
        //                 // Sum the 'dr' amounts for the leafNode
        //                 $totalDr = $vouchers->sum('dr');

        //                 // Build hierarchy for each leaf node
        //                 $hierarchy = $leafNode->ancestors()->reverse()->push($leafNode);

        //                 // Append the hierarchy and the total amount
        //                 $nodeHierarchy[$rootNode->type][] = [
        //                     'hierarchy' => $hierarchy,
        //                     'total_dr' => $totalDr
        //                 ];
        //             }
        //         }
        //     }

        //     // Convert to collections for easier manipulation in the view
        //     foreach ($nodeHierarchy as $type => &$items) {
        //         $items = collect($items);
        //     }

        //     // Pass the node hierarchy to the view
        //     $data['node_hierarchy'] = $nodeHierarchy;
        //     return view(parent::LoadView($this->view_path . '.balance_sheet'),compact('data'));

        //     return view('admin.voucher.balance_sheet', compact('data'));

        // } catch (\Exception $e) {
        //     Log::error('Error fetching finance data: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
        //     return response()->json(['error' => 'Failed to fetch finance data'], 500);
        // }


        // try {
        //     $rootNodes = Node::whereNull('parent_id')->whereIn('type', ['asset', 'liabilities'])->get();
        //     $nodeHierarchy = [];

        //     foreach ($rootNodes as $rootNode) {
        //         $descendants = $rootNode->descendants();
        //         $leafNodes = $descendants->filter(fn($node) => $node->isLeaf());

        //         foreach ($leafNodes as $leafNode) {
        //             $vouchers = VoucherDrCr::where('title', $leafNode->id)->get();
        //             if ($vouchers->isNotEmpty()) {
        //                 $totalDr = $vouchers->sum('dr');
        //                 $hierarchy = $leafNode->ancestors()->reverse()->push($leafNode);

        //                 $nodeHierarchy[$rootNode->type][] = [
        //                     'hierarchy' => $hierarchy,
        //                     'total_dr' => $totalDr
        //                 ];
        //             }
        //         }
        //     }

        //     // Convert to collections
        //     foreach ($nodeHierarchy as $type => &$items) {
        //         $items = collect($items);
        //     }

        //     $data['node_hierarchy'] = $nodeHierarchy;
        //     return view(parent::LoadView($this->view_path . '.balance_sheet'),compact('data'));

        //     return view('admin.voucher.balance_sheet', compact('data'));

        // } catch (\Exception $e) {
        //     Log::error('Error fetching finance data: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
        //     return response()->json(['error' => 'Failed to fetch finance data'], 500);
        // }


        // try {
        //     $rootNodes = Node::whereNull('parent_id')->whereIn('type', ['asset', 'liabilities'])->get();
        //     $nodeHierarchy = [];

        //     foreach ($rootNodes as $rootNode) {
        //         $descendants = $rootNode->descendants();
        //         $leafNodes = $descendants->filter(fn($node) => $node->isLeaf());

        //         foreach ($leafNodes as $leafNode) {
        //             $vouchers = VoucherDrCr::where('title', $leafNode->id)->get();
        //             if ($vouchers->isNotEmpty()) {
        //                 $totalDr = $vouchers->sum('dr');
        //                 $hierarchy = $leafNode->ancestors()->reverse()->push($leafNode);

        //                 $nodeHierarchy[$rootNode->type][] = [
        //                     'hierarchy' => $hierarchy,
        //                     'total_dr' => $totalDr
        //                 ];
        //             }
        //         }
        //     }

        //     // Convert to collections
        //     foreach ($nodeHierarchy as $type => &$items) {
        //         $items = collect($items);
        //     }

        //     $data['node_hierarchy'] = $nodeHierarchy;
        //     return view(parent::LoadView($this->view_path . '.balance_sheet'),compact('data'));

        //     return view('admin.voucher.balance_sheet', compact('data'));

        // } catch (\Exception $e) {
        //     Log::error('Error fetching finance data: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
        //     return response()->json(['error' => 'Failed to fetch finance data'], 500);
        // }


        try {
            $rootNodes = Node::whereNull('parent_id')->whereIn('type', ['asset', 'liabilities'])->get();
            $nodeHierarchy = [];

            foreach ($rootNodes as $rootNode) {
                $descendants = $rootNode->descendants();

                $leafNodes = $descendants->filter(function ($node) {
                    return $node->isLeaf();
                });

                foreach ($leafNodes as $leafNode) {
                    $vouchers = VoucherDrCr::where('title', $leafNode->id)->get();

                    if ($vouchers->isNotEmpty()) {
                        $totalDr = $vouchers->sum('dr');
                        $hierarchy = $leafNode->ancestors()->reverse()->push($leafNode);

                        $nodeHierarchy[$rootNode->type][] = [
                            'hierarchy' => $hierarchy,
                            'voucher' => $vouchers,
                            'total_dr' => $totalDr
                        ];
                    }
                }
            }

            // Sum amounts for each parent
            foreach ($nodeHierarchy as $type => &$items) {
                $items = collect($items)->groupBy(function ($item) {
                    return $item['hierarchy']->last()->parent_id;
                })->map(function ($group) {
                    $totalDr = $group->sum('total_dr');
                    return [
                        'hierarchy' => $group->first()['hierarchy']->slice(0, -1),
                        'total_dr' => $totalDr,
                        'leaf_nodes' => $group
                    ];
                });
            }

            $data['node_hierarchy'] = $nodeHierarchy;
            return view(parent::LoadView($this->view_path . '.balance_sheet'),compact('data'));

            return view('admin.voucher.balance_sheet', compact('data'));

        } catch (\Exception $e) {
            Log::error('Error fetching finance data: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
            return response()->json(['error' => 'Failed to fetch finance data'], 500);
        }
    }


    public function balancesheet_new(Request $request) {
        try {
            // Initialize collections to hold node IDs and hierarchy
            $nodeHierarchy = [
                'asset' => collect(),
                'liabilities' => collect()
            ];

            // Fetch all root nodes for assets and liabilities
            $rootNodes = Node::whereIn('type', ['asset', 'liabilities'])->whereNull('parent_id')->get();

            foreach ($rootNodes as $rootNode) {
                $type = trim($rootNode->type);

                // Build hierarchy for the root node
                $hierarchy = collect();
                $this->buildHierarchy($rootNode, $hierarchy);

                // Add to node hierarchy
                $nodeHierarchy[$type]->push($hierarchy);
            }
            // dd($nodeHierarchy);
            // Debug: Log hierarchy
            // Log::info('Node Hierarchy:', $nodeHierarchy->toArray());

            // Get the titles from VoucherDrCr based on leaf node IDs
            $data['assets'] = VoucherDrCr::whereIn('title', $nodeHierarchy['asset']->pluck('id')->flatten()->unique())
                                        ->where('dr', '>', 0)
                                        ->get();
            $data['assets_sum'] = $data['assets']->sum('dr');

            $data['liabilities'] = VoucherDrCr::whereIn('title', $nodeHierarchy['liabilities']->pluck('id')->flatten()->unique())
                                            ->where('dr', '>', 0)
                                            ->get();
            $data['liabilities_sum'] = $data['liabilities']->sum('dr');

            // Pass the node hierarchy to the view
            $data['node_hierarchy'] = $nodeHierarchy;
            // dd($data);
            return view(parent::LoadView($this->view_path . '.balance_sheet'), compact('data'));

        } catch (\Exception $e) {
            Log::error('Error fetching finance data: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
            return response()->json(['error' => 'Failed to fetch finance data'], 500);
        }
    }

    // Recursive function to build the hierarchy
    private function buildHierarchy($node, &$hierarchy) {
        $nodeData = collect(['node' => $node, 'children' => collect()]);
        $children = Node::where('parent_id', $node->id)->get();
        foreach ($children as $child) {
            $this->buildHierarchy($child, $nodeData['children']);
        }
        $hierarchy->push($nodeData);
    }


    public function create()
    {
        $data['udhyog'] = Udhyog::where('name', 'Achar')->first();
            $data['path'] = 'अचार';
            // $data['vouchers'] = Voucher::with('voucherType')->where('udhyog_id',$udhyog->id)->get();

        $currentDate = date('Y-m-d');
        //conver English date to Nepali date   // Thaman 2078-01-01
        $data['nep_date_unicode']  = datenepUnicode($currentDate, 'nepali');
        $data['get_sirshak']       = $this->model->getLekhaSirshak();
        $data['bhoucher_no']       = $this->model->getbhoucherNo();
        $data['fiscal']            = $this->model->getFiscal();
        $data['voucher_type']      = $this->model->getVoucherType();
        $data['lekha_shirshak']    = $this->model->getLekhaSirshak();
        // $data['leafNodes']            = Node::get();
        $data['voucher_type'] = Node::where('parent_id', null)->get();
        $data['titles'] = Node::all()->filter(function($account) {
            return $account->isLeaf();
        });

        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }
    public function getChildTitles($voucherType)
    {
        try {
            $titles = Node::where('parent_id', $voucherType)->get()->filter(function($account) {
                return $account->isLeaf();
            });

            if ($titles->isEmpty()) {
                return response()->json(['message' => 'No titles found'], 404);
            }

            return response()->json($titles);
        } catch (\Exception $e) {
            Log::error('Error fetching child titles: '.$e->getMessage());
            return response()->json(['error' => 'Failed to fetch child titles'], 500);
        }
    }


    public function store(Request $request)
    {
        // $request->validate($this->model->getRules(),$this->model->getMessage());

        // $this->model->storeData($request, $request->date, $request->voucher_type, $request->lekha_shirshak, $request->bhoucher_no, $request->fiscal, $request->remarks, $request->status,$request->total_debit,$request->total_credit,$request->title, $request->dr, $request->cr, $request->bhoucher_name);
        $request->validate([
            'date' => 'required',
            'voucher_type' => 'required',
            // 'account_type' => 'required',
            // 'voucher_name' => 'required',
            // 'amount' => 'required',
            // 'description' => 'required',
        ]);
        // dd($request->all());
        $this->model->storeData($request, $request->date, $request->voucher_type, $request->bhoucher_no, $request->remarks, $request->status,$request->total_debit,$request->total_credit,$request->title, $request->dr, $request->cr, $request->udhyog, $request->description);
        return redirect()->route($this->base_route . '.index')->with('success', 'Voucher created successfully');
        return redirect()->route($this->base_route . '.index')->with('success', 'Voucher created successfully');
    }

    public function viewReport($id){
        $voucher = Voucher::findOrFail($id);
         // Retrieve the debit and credit details with financeTitle relationship
         $data['dr_cr_details'] = VoucherDrCr::where('voucher_id', $voucher->id)
                                            ->with('financeTitle')
                                            ->get();

        // Calculate the sum of debits and credits for the specific voucher
        $data['dr_cr_sum'] = VoucherDrCr::where('voucher_id', $voucher->id)
        ->select(
        'voucher_id',
        DB::raw('SUM(dr) as dr_total'),
        DB::raw('SUM(cr) as cr_total')
        )
        ->groupBy('voucher_id')
        ->first();
        $data['voucher'] = $voucher;
        // dd($data['dr_cr_details'][0]->financeTitle);
        return view(parent::loadView($this->view_path . '.report'), compact('data'));

    }

    public function destroy($id)
    {
        $data = $this->model->findOrFail($id);
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        $data->destroy($id);
        // return redirect()->back()->with('success_message', 'Worker Deleted Successfully !!');
        return response()->json($data);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    use HasFactory;

    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'dealers';
    protected $id;
    protected $prefix_path_image = '/upload_file/dealers/';
    protected $fillable = [
        'name', 'address', 'email', 'phone',
    ];

    public function __construct()
    {

        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }
    //get Data
    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(10);
    }
    public function storeData($request, $requestData)
    {
        try {
            $data                               = new Dealer;
            $data->name                         = $requestData['name'];
            $data->phone                        = $requestData['phone'];
            $data->email                        = $requestData['email'];
            $data->address                      = $requestData['address'];
            if($requestData['address'] != null){
                $udhyogDetails = Udhyog::where('name', $request->udhyog)->first();
                if($udhyogDetails){
                    $data->udhyog_id = $udhyogDetails->id;
                }else{
                    return false;
                }
            }
            $data->save();
            return true;
        } catch (HttpResponseException $e) {
            return false;
        }
    }

    public function updateData($request, $id, $requestData){
        try {
            $data                               = Dealer::findOrFail($id);
            $data->name                         = $requestData['name'];
            $data->phone                        = $requestData['phone'];
            $data->email                        = $requestData['email'];
            $data->address                      = $requestData['address'];
            $data->update();
            return true;
        } catch (HttpResponseException $e) {
            return false;
        }
    }

    function getRules($id = null){
        // $uniqueRule = Rule::unique($this->getTable());

        // if ($id) {
        //     $uniqueRule->ignore($id);
        // }
        return [
            'name'                 => 'required|string|max:255',
            'phone'                 => 'required',
            'email'                     => 'required|string',
            'address'                   => 'required',
        ];
    }

    public function getMessage()
    {
        return [
            'name.required' => 'डिलरको नाम अनिवार्य छ !!',
            'phone.required' => 'डिलरको फोन नं अनिवार्य छ !!',
            'email.required' => 'डिलरको ईमेल अनिवार्य छ !!',
            'address.required' => 'डिलरको ठेगाना अनिवार्य छ !!',
        ];
    }
}

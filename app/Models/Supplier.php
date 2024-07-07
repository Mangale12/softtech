<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'supplier';
    protected $id;
    protected $prefix_path_image = '/upload_file/supplier/';
    protected $guarded = [];
    protected $fillable = [
        'name', 'contact_info', 'address', 'email', 'phone',
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
    public function storeData($request, $full_name, $mobile, $email, $address, $contoctor_name, $contoctor_phone, $udhyog=null)
    {
        try {
            $data                               = new Supplier;
            $data->name                    = $full_name;
            $data->phone                       = $mobile;
            $data->email                       = $email;
            $data->address                      = $address;
            $data->contactor_phone         = $contoctor_name;
            $data->contactor_phone         = $contoctor_phone;
            if($udhyog != null){
                $udhyogDetails = Udhyog::where('name', $udhyog)->first();
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

    public function updateData($request, $id, $full_name, $mobile, $email, $address, $contactor_name, $contactor_phone){
        try {
            $data                          = Supplier::findOrFail($id);
            $data->name                    = $full_name;
            $data->phone                   = $mobile;
            $data->email                   = $email;
            $data->address                 = $address;
            $data->contactor_name         = $contactor_name;
            $data->contactor_phone         = $contactor_phone;
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
            'email' => 'required|email|unique:suppliers,email,' . $id,
            'address'                   => 'required',
        ];
    }

    public function getMessage()
{
    return [
        'name.required' => 'सप्प्लाईरको नाम अनिवार्य छ !!',
        'phone.required' => 'सप्प्लाईरको फोन नं अनिवार्य छ !!',

        'email.required' => 'सप्प्लाईरको ईमेल अनिवार्य छ !!',
        'address.required' => 'सप्प्लाईरको ठेगाना अनिवार्य छ !!',
    ];
}

    public function rawMaterials()
    {
        return $this->hasMany(RawMaterial::class);
    }

    public function account(){
        return $this->hasMany(Transaction::class, 'supplier_id');
    }

    public function udhyog()
    {
        return $this->belongsTo(Udhyog::class, 'udhyog_id');
    }
}

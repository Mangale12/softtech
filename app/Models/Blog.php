<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Blog extends DM_BaseModel
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at', 'created_at'];

    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'blogs';

    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'blog';
    protected $file   = 'file';
    protected $prefix_path_image = '/upload_file/blog/';
    protected $prefix_path_file = '/upload_file/blog/file/';

    protected $fillable = [
        'title', 'order'
    ];


    public function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
        $this->folder_path_file = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR . $this->file . DIRECTORY_SEPARATOR;
    }


    public function postCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
    public function postTypes()
    {
        return $this->belongsTo(Types::class, 'types_id');
    }

    public function LocationTypes()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    //POST
    public function getRules()
    {
        $rules = array(
            'category_id'            => 'required|max:255',
            'title'                  => 'required|max:225',
            'image'                  => 'sometimes|mimes:jpeg,jpg,png,gif|max:50000',
            'brochure'               => 'sometimes|max:50000',
            'status'                 => 'required|boolean'
        );
        return $rules;
    }
    //Page
    public function getRulesPage()
    {
        $rules = array(
            'title'                  => 'required|max:225',
            'image'                  => 'sometimes|mimes:jpeg,jpg,png,gif|max:50000',
            'brochure'               => 'sometimes|max:50000',
            'status'                 => 'required|boolean'
        );
        return $rules;
    }


    public function getData()
    {
        $data = Blog::where('deleted_at', '=', null)
            ->orderBy('id', 'DESC')->get();
        return $data;
    }
    public function getCategory()
    {
        $data = DB::table('blog_categories')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }

    public function storeData(Request $request, $category_id, $type, $title, $description, $course_content, $status, $featured, $image, $brochure)
    {
         // dd($category_id, $type, $title, $description, $course_content, $status, $featured, $image , $brochure);
        // for thumbnail
        $post_unique_id = uniqid(Auth::user()->id . '_');
        if ($request->hasFile('image')) {
            $post_thumbnail = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image');
        } else {
            $post_thumbnail = null;
        }
        // for  multiple files
        if ($request->hasFile('brochure')) {
            $post_files = parent::uploadMultipleFiles($request, $this->folder_path_file, $this->prefix_path_file, 'brochure');
        } else {
            $post_files = null;
        }

        $posts[] = [
            'post_unique_id'                     => $post_unique_id,
            'category_id'                        => $category_id,
            'type'                               => $type,
            'title'                              => $title,
            'slug'                               => Str::slug($title),
            'thumbs'                             => $post_thumbnail,
            'description'                        => $description,
            'course_content'                     => json_encode(array_filter($request->course_content)),
            'status'                             => $status,
            'featured'                           => $featured,
            'created_at'                         => new DateTime(),
        ];
        if (isset($post_files)) {
            foreach ($post_files as $post_files)
                File::create([
                    'post_unique_id'             =>  $post_unique_id,
                    'title'                      =>  $title,
                    'file'                       =>  $post_files,
                ]);
        }
        if (Blog::insert($posts)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateData(Request $request, $post_unique_id, $category_id, $type, $title, $description, $course_content, $status, $featured, $image, $brochure)
    {
        // dd($category_id, $type, $title, $description, $course_content, $status, $featured, $image , $brochure);
        $blog = Blog::where('post_unique_id', '=', $post_unique_id)->first();
        //for thumbnail
        if ($request->hasFile('image')) {
            $file_path = getcwd() . $blog->thumbs;
            if (is_file($file_path)) {
                unlink($file_path);
            }
            $blog->thumbs = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image');
        }
        // for  multiple files
        if ($request->hasFile('brochure')) {
            $post_files = parent::uploadMultipleFiles($request, $this->folder_path_file, $this->prefix_path_file, 'brochure');
        } else {
            $post_files = null;
        }
        $blog->category_id                          =  $category_id;
        $blog->title                                =  $title;
        $blog->slug                                 =  Str::slug($title);
        $blog->type                                 =  $type;
        $blog->description                          =  $description;
        $blog->course_content                       =  json_encode(array_filter($request->course_content));
        $blog->status                               =  $status;
        $blog->featured                             =  $featured;
        $blog->updated_at                           =  new DateTime();
        $blog->save();

        if (isset($post_files)) {
            foreach ($post_files as $post_files)
                File::create([
                    'post_unique_id'                 => $post_unique_id,
                    'title'                          =>  $title,
                    'file'                           => $post_files,
                ]);
        }
    }
}

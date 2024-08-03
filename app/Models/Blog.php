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
        'type',
        'category_id',
        'user_id',
        'post_unique_id',
        'slug',
        'thumbs',
        'route_map',
        'featured',
        'tag',
        'author',
        'url',
        'days',
        'title',
        'description',
        'faqs',
        'videos',
        'more_details',
        'meta_title',
        'meta_tag',
        'meta_description',
        'status',
        'destination',
        'durations',
        'trip_difficulty',
        'activities',
        'max_altitude',
        'group_size',
        'season_id',
        'trail_address',
        'difficult_id',
        'month_id',
        'experience_id',
        'culture_id',
        'transport_id',
    ];

    protected $casts = [
        'faqs' => 'array',
        'images' => 'array',
        'videos' => 'array',
        'days' => 'array',
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
    public function getSeason()
    {
        $data = DB::table('seasons')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    public function getDifficulty()
    {
        $data = DB::table('defficults')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }

    public function getMonth()
    {
        $data = DB::table('months')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }

    public function getExperience()
    {
        return DB::table('experiences')->where('status', 1)->orderBy('id', 'DESC')->get();
    }

    public function getCulture()
    {
        return DB::table('culturals')->where('status', 1)->orderBy('id', 'DESC')->get();
    }

    public function getTransport()
    {
        return DB::table('transports')->where('status', 1)->orderBy('id', 'DESC')->get();
    }
    function getYoutubeIdFromUrl($video_url)
    {
        preg_match("#([\/|\?|&]vi?[\/|=]|youtu\.be\/|embed\/)([a-zA-Z0-9_-]+)#", $video_url, $matches);
        if ($matches) {
            return $matches[2];
        }
    }
    public function storeData(Request $request)
    {
        try {
            DB::beginTransaction();
            $blog = new Blog();
            $post_unique_id = uniqid(Auth::user()->id . '_');
            $slug = Str::slug($request->title);
            $post_thumbnail = null;
            $route_map = null;
            if ($request->hasFile('blog_thumnail')) {
                $post_thumbnail = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'blog_thumnail');
            }
            // for  multiple files
            if ($request->hasFile('route_map')) {
                $route_map = parent::uploadImage($request, $this->folder_path_file, $this->prefix_path_file, 'route_map');
            }
            $videoes = [];
            foreach ($request->video_link as $key => $link) {
                $videoData = [
                    'id' => $this->getYoutubeIdFromUrl($link),
                    'link' => $link,
                    'thumbnail' => null, // Default to null
                ];

                // Check if the video_thumbnail file is provided for this link
                if ($request->hasFile("video_thumbnail.$key")) {
                    $videoData['thumbnail'] = $this->uploadFile($request->file("video_thumbnail.$key"));
                }

                $videoes[] = $videoData;
            }
            $blog->type = $request->type;
            $blog->category_id = $request->category_id;
            $blog->user_id = Auth::user()->id;
            $blog->post_unique_id = $post_unique_id;
            $blog->slug = $slug;
            $blog->thumbs = $post_thumbnail;
            $blog->route_map = $route_map;
            // $blog->featured = $request->featured;
            $blog->tag = $request->tag;
            $blog->author = $request->author;
            $blog->url = $request->url;
            $blog->days = json_encode($request->days);
            $blog->title = $request->title; // Ensure title is included
            $blog->description = $request->description;
            $blog->faqs = json_encode($request->faq);
            $blog->videos = json_encode($videoes);
            $blog->more_details = $request->more_details;
            $blog->meta_title = $request->meta_title;
            $blog->meta_tag = json_encode(explode(',', $request->meta_tag));
            $blog->meta_description = $request->meta_description;
            $blog->status = $request->status;
            $blog->destination = $request->destination;
            $blog->durations = $request->durations;
            $blog->trip_difficulty = $request->trip_difficulty;
            $blog->activities = $request->activities;
            $blog->max_altitude = $request->max_altitude;
            $blog->group_size = $request->group_size;
            $blog->season_id = $request->season_id;
            $blog->difficult_id = $request->difficult_id;
            $blog->transport_id = $request->transport_id;
            $blog->month_id = $request->month_id;
            $blog->culture_id = $request->culture_id;
            $blog->experience_id = $request->experience_id;
            $blog->trail_address = $request->trail_address;
            $blog->save();

            // Upload images if provided
            if ($request->hasFile('images')) {

                foreach ($request->file('images') as $image) {
                    $blogImage = new BlogImage();
                    $imagePath = $this->uploadBlogImage($image);
                    $blogImage->image_path = $imagePath;
                    $blogImage->user_id = Auth::user()->id;
                    $blogImage->blog_id = $blog->id;
                    $blogImage->save();
                }
            }

            if (isset($post_files)) {
                foreach ($post_files as $file) {
                    File::create([
                        'post_unique_id' => $post_unique_id,
                        'title' => $request->title,
                        'file' => $file,
                    ]);
                }
            }
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            return false;
        }
    }

    protected function uploadFile($file)
    {
        $folderPath = 'uploads/videos/thumbnails/';
        $prefixPath = 'thumbnail_';
        $fileName = $prefixPath . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($folderPath), $fileName);
        return $folderPath . $fileName;
    }

    protected function uploadBlogImage($file)
    {
        $folderPath = 'uploads/blog/images/';
        $prefixPath = 'blag_';
        $fileName = $prefixPath . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($folderPath), $fileName);
        return $folderPath . $fileName;
    }

    public function updateData(Request $request, $post_unique_id)
    {
        // dd($category_id, $type, $title, $description, $course_content, $status, $featured, $image , $brochure);
        try {
            DB::beginTransaction();
            $videoes = [];
            $blog = Blog::where('post_unique_id', '=', $post_unique_id)->first();
            $slug = Str::slug($request->title);
            // check if blog already exists and requested or not
            if ($request->hasFile('blog_thumnail')) {
                if (file_exists(public_path($blog->thumbs))) {
                    File::delete(public_path($blog->thumbs));
                }
                $blog->thumbs =  $this->uploadFile($request->file("blog_thumnail"));
            }
            // check route map is reqquesed or not
            if ($request->hasFile('route_map')) {
                if (file_exists(public_path($blog->route_map))) {
                    File::delete(public_path($blog->route_map));
                }
                $blog->route_map = parent::uploadImage($request, $this->folder_path_file, $this->prefix_path_file, 'route_map');
            }
            //blog video link
            foreach ($request->video_link as $key => $link) {
                $videoData = [
                    'link' => $link,
                    'thumbnail' => !empty($request->image_path[$key]) ? $request->image_path[$key] : null, // Default to null
                ];

                // Check if the video_thumbnail file is provided for this link
                if ($request->hasFile("video_thumbnail.$key")) {
                    $videoData['thumbnail'] = $this->uploadFile($request->file("video_thumbnail.$key"));
                }

                $videoes[] = $videoData;
            }
            $blog->type = $request->type;
            $blog->category_id = $request->category_id;
            $blog->user_id = Auth::user()->id;
            $blog->post_unique_id = $post_unique_id;
            $blog->slug = $slug;

            // $blog->featured = $request->featured;
            $blog->tag = $request->tag;
            $blog->author = $request->author;
            $blog->url = $request->url;
            $blog->days = json_encode($request->days);
            $blog->title = $request->title; // Ensure title is included
            $blog->description = $request->description;
            $blog->faqs = json_encode($request->faq);
            $blog->videos = json_encode($videoes);
            $blog->more_details = $request->more_details;
            $blog->meta_title = $request->meta_title;
            $blog->meta_tag = json_encode(explode(',', $request->meta_tag));
            $blog->meta_description = $request->meta_description;
            $blog->status = $request->status;
            $blog->destination = $request->destination;
            $blog->durations = $request->durations;
            $blog->trip_difficulty = $request->trip_difficulty;
            $blog->activities = $request->activities;
            $blog->max_altitude = $request->max_altitude;
            $blog->group_size = $request->group_size;
            $blog->season_id = $request->season_id;
            $blog->save();

            // Upload images if provided
            if ($request->hasFile('images')) {

                foreach ($request->file('images') as $image) {
                    $blogImage = new BlogImage();
                    $imagePath = $this->uploadBlogImage($image);
                    $blogImage->image_path = $imagePath;
                    $blogImage->user_id = Auth::user()->id;
                    $blogImage->blog_id = $blog->id;
                    $blogImage->save();
                }
            }

            if (isset($post_files)) {
                foreach ($post_files as $file) {
                    File::create([
                        'post_unique_id' => $post_unique_id,
                        'title' => $request->title,
                        'file' => $file,
                    ]);
                }
            }
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollback();
            return false;
        }
    }


    public function blogImages()
    {
        return $this->hasMany(BlogImage::class, 'blog_id');
    }
}

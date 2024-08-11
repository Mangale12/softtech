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
    protected $folder_path_thumbs;
    protected $folder = 'blog';
    protected $file   = 'thumbs';
    protected $prefix_path_image = '/upload_file/blog/';
    protected $prefix_path_thumbs = '/upload_file/blog/file/';

    public function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
        $this->folder_path_thumbs = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR . $this->file . DIRECTORY_SEPARATOR;
    }


    public function postCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
    public function TransportCategory()
    {
        return $this->belongsTo(Transport::class, 'transport_id');
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
            ->select('id', 'title')->get();
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
            $blog                          = new Blog();
            $post_unique_id                = uniqid(Auth::user()->id . '_');
            if ($request->hasFile('thumbs')) {
                $blog->thumbs = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'thumbs', '');
            }
            if ($request->hasFile('route_map')) {
                $blog->route_map = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'route_map', '', '');
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
            $blog->type                              = $request->type;
            $blog->category_id                       = $request->category_id;
            $blog->user_id                           = Auth::user()->id;
            $blog->post_unique_id                    = $post_unique_id;
            $blog->slug                              = Str::slug($request->title);
            $blog->tag                               = $request->tag;
            $blog->author                            = $request->author;
            $blog->url                               = $request->url;
            $blog->days                              = json_encode($request->days);
            $blog->title                             = $request->title; // Ensure title is included
            $blog->description                       = $request->description;
            $blog->faqs                              = json_encode($request->faq);
            $blog->videos                            = json_encode($videoes);
            $blog->more_details                      = $request->more_details;
            $blog->meta_title                        = $request->meta_title;
            $blog->meta_tag                          = json_encode(explode(',', $request->meta_tag));
            $blog->meta_description                  = $request->meta_description;
            $blog->status                            = $request->status;
            $blog->destination                       = $request->destination;
            $blog->durations                         = $request->durations;
            $blog->trip_difficulty                   = $request->trip_difficulty;
            $blog->activities                        = $request->activities;
            $blog->max_altitude                      = $request->max_altitude;
            $blog->group_size                        = $request->group_size;
            $blog->season_id                         = $request->season_id;
            $blog->difficult_id                      = $request->difficult_id;
            $blog->transport_id                      = $request->transport_id;
            $blog->month_id                          = $request->month_id;
            $blog->culture_id                        = $request->culture_id;
            $blog->experience_id                     = $request->experience_id;
            $blog->trail_address                     = $request->trail_address;
            $blog->save();
            // Upload images if provided
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $blogImage                        = new BlogImage();
                    $imagePath                        = $this->uploadBlogImage($image);
                    $blogImage->image_path            = $imagePath;
                    $blogImage->user_id               = Auth::user()->id;
                    $blogImage->blog_id               = $blog->post_unique_id;
                    $blogImage->save();
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
        try {
            DB::beginTransaction();
            $videoes = [];
            $blog = Blog::where('post_unique_id', '=', $post_unique_id)->first();
            if ($request->hasFile('thumbs')) {
                $file_path = getcwd() . $blog->thumbs;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                $blog->thumbs = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'thumbs', '', '');
            }
            if ($request->hasFile('route_map')) {
                $file_path = getcwd() . $blog->route_map;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                $blog->route_map = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'route_map', '', '');
            }
            //blog video link
            foreach ($request->video_link as $key => $link) {
                $videoData = [
                    'link' => $link,
                    'thumbnail' => !empty($request->image_path[$key]) ? $request->image_path[$key] : null, // Default to null
                ];

                // Check if the video_thumbnail file is provided for this link
                if ($request->hasFile("video_thumbnail.$key")) {
                    $videoData['thumbnail'] = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'video_thumbnail', '', '');
                }

                $videoes[] = $videoData;
            }
            $blog->type                                = $request->type;
            $blog->category_id                         = $request->category_id;
            $blog->user_id                             = Auth::user()->id;
            $blog->post_unique_id                      = $post_unique_id;
            $blog->slug                                = Str::slug($request->title);
            $blog->tag                                  = $request->tag;
            $blog->author                               = $request->author;
            $blog->url                                  = $request->url;
            $blog->days                                 = json_encode($request->days);
            $blog->title                                = $request->title; // Ensure title is included
            $blog->description                          = $request->description;
            $blog->faqs                                 = json_encode($request->faq);
            $blog->videos                               = json_encode($videoes);
            $blog->more_details                         = $request->more_details;
            $blog->meta_title                           = $request->meta_title;
            $blog->meta_tag                             = json_encode(explode(',', $request->meta_tag));
            $blog->meta_description                     = $request->meta_description;
            $blog->status                               = $request->status;
            $blog->destination                          = $request->destination;
            $blog->durations                            = $request->durations;
            $blog->trip_difficulty                      = $request->trip_difficulty;
            $blog->activities                           = $request->activities;
            $blog->max_altitude                         = $request->max_altitude;
            $blog->group_size                           = $request->group_size;
            $blog->season_id                         = $request->season_id;
            $blog->difficult_id                      = $request->difficult_id;
            $blog->transport_id                      = $request->transport_id;
            $blog->month_id                          = $request->month_id;
            $blog->culture_id                        = $request->culture_id;
            $blog->experience_id                     = $request->experience_id;
            $blog->season_id                            = $request->season_id;
            $blog->save();
            // Upload images if provided
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $blogImage = new BlogImage();
                    $imagePath = $this->uploadBlogImage($image);
                    $blogImage->image_path = $imagePath;
                    $blogImage->user_id = Auth::user()->id;
                    $blogImage->blog_id = $blog->post_unique_id;
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

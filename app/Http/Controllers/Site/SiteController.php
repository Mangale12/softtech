<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Models\Eloquent\DM_Post;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Career;
use App\Models\Clients;
use App\Models\Contact;
use App\Models\Counter;
use App\Models\DemanCourses;
use App\Models\Gallery;
use App\Models\Location;
use App\Models\Menu;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Program;
use App\Models\Section;
use App\Models\Setting;
use App\Models\Staff;
use App\Models\Testimonial;
use App\Models\Types;
use App\Models\Video;
use App\Models\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Constraint\Count;
use App\Models\SubscribeMail;
use App\Models\Member;
use App\Models\MemberType;
use App\Models\BlogImage;
use App\Models\AchieveMent;
use App\Models\Destination;
use App\Models\Faq;
use App\Models\OurService;
class SiteController extends DM_BaseController
{
    protected $panel;
    protected $base_route = 'site';
    protected $view_path = 'front_end';
    protected $model;
    protected $table;
    protected $contact_email;
    protected $common;
    protected $member;
    protected $memberType;
    protected $post;
    protected $blogImage;
    public function __construct(Request $request, DM_Post $dm_post, Setting $setting, Member $member, MemberType $memberType, Blog $post, BlogImage $blogImage)
    {
        $this->dm_post = $dm_post;
        $this->email = $setting::pluck('site_email')->first();
        $this->member = $member;
        $this->memberType = $memberType;
        $this->post = $post;
        $this->blogImage = $blogImage;
    }

    //Home Page
    public function index()
    {
        $data['menu']             = Menu::tree();
        $data['banner']           = Banner::where('status', '=', 1)->where('deleted_at', '=', null)->get();  //Banner
        $data['achivement']       = AchieveMent::where('status', '=', 1)->get(); //Achievement
        $data['destination']      = Destination::where('status', '=', 1)->get(); //Destination
        $data['services']         = OurService::where('status', '=', 1)->get(); //Our Service
        $data['faq']              = Faq::where('status', '=', 1)->get(); //FAQ
        $data['video']            = Video::where('status', '=', 1)->get(); //Video
        $data['upcoming-trail']   = $this->dm_post::getUpcommingTrail(8);  //Post
        $data['latest-trail']     = $this->dm_post::getLatestTrail(8); //
        $data['feature_page']     = $this->dm_post::featuredPageList();
        return view(parent::loadView(parent::loadView($this->view_path.'.index')), compact('data'));
    }

    public function trails(){
        $data['menu'] = Menu::tree();
        // $data['trails'] = $this->dm_post::getTrails();
        $data['categories'] = $this->dm_post::getCategories();
        $data['seasion'] = $this->dm_post::getSeasion();
        $data['months'] = $this->dm_post::getMonths();
        $data['difficulty'] = $this->dm_post::getDifficulty();
        $data['culture'] = $this->dm_post::getCulture();
        $data['experience'] = $this->dm_post::getExperience();
        return view(parent::loadView($this->view_path.'.trail.trail'), compact('data'));
    }

    public function searchTrails(Request $request)
    {
        $query = $request->input('query');
        $filter = $request->input('filter');
        $type = $request->input('type');
        $id = $request->input('id');
        $trails = Blog::where('status', 1)->where('type', 'post')->where('deleted_at', null);
        if($query){
            $trails = $trails->where('title', 'LIKE', '%' . $query . '%')->get();
        }
        if ($filter) {
            switch ($filter) {
                case 'All Trails':
                    // Add your filter condition for upcoming trails
                    $trails = $trails->get();
                    break;
                case 'New Trails':
                    // Add your filter condition for new trails
                    $trails = $trails->where('created_at', '>', now()->subMonth())->get();
                    break;
                case 'Existing Trails':
                    // Add your filter condition for existing trails
                    $trails = $trails->where('status', 'existing')->get();
                    break;
                default:
                    // Default case for 'All Trail' or no filter
                    $trails = null;
                    break;
            }
        }
        if ($type) {
            switch ($type) {
                case 'season':
                    // Add your filter condition for upcoming trails
                    $trails = $trails->where('season_id', $id)->get();
                    break;
                case 'months':
                    // Add your filter condition for new trails
                    $trails = $trails->where('month_id', $id)->get();
                    break;
                case 'difficulty':
                    // Add your filter condition for existing trails
                    $trails = $trails->where('difficult_id', $id)->get();
                    break;
                case 'culture':
                    // Add your filter condition for existing trails
                    $trails = $trails->where('culture_id', $id)->get();
                    break;
                case 'experience':
                    // Add your filter condition for existing trails
                    $trails = $trails->where('experience_id', $id)->get();
                    break;
                default:
                    // Default case for 'All Trail' or no filter
                    $trails = null;
                    break;
            }
        }


        return response()->json($trails);
    }
    //About Us
    // public function aboutUs()
    // {
    //     $data['menu'] = Menu::tree();
    //     $data['featured_pages'] = $this->dm_post::featuredPageList();
    //     $data['about'] = Section::where('status', '=', 1)->where('position', 'about')->orderBy('order', 'desc')->get();
    //     return view(parent::loadView($this->view_path . '.about'), compact('data'));
    // }

    //ourvalues
    public function ourvalues()
    {
        $data['menu'] = Menu::tree();
        $data['our-value'] = Section::where('status', '=', 1)->where('position', 'our-value')->orderBy('order', 'desc')->get();
        return view(parent::loadView($this->view_path . '.our-values'), compact('data'));
    }

    //principles
    public function principles()
    {
        $data['menu'] = Menu::tree();
        $data['principles'] = Section::where('status', '=', 1)->where('position', 'our-principles')->orderBy('order', 'desc')->get();
        return view(parent::loadView($this->view_path . '.principles'), compact('data'));
    }

    //Staff
    public function staff()
    {
        $data['menu'] = Menu::tree();
        $data['india_team'] = Staff::where('status', '=', 1)->where('country_member', 'india-team-member')->orderBy('id', 'desc')->get();
        $data['nepal_team'] = Staff::where('status', '=', 1)->where('country_member', 'nepal-team-member')->orderBy('id', 'desc')->get();
        return view(parent::loadView($this->view_path . '.staff'), compact('data'));
    }

    //Show Post
    public function showPost($post_unique_id)
    {
        $data['menu'] = Menu::tree();
        $data['row'] = $this->dm_post::getSinglePost($post_unique_id);
        $data['file'] = $this->dm_post::getFile($post_unique_id);
        $data['category'] = $this->dm_post::getCategoryList();
        foreach ($data['category'] as $row) {
            $data['cat_post_' . $row->title] = $this->dm_post::categoryPost($row->id, '6');
            // $data['cat_post_new'. $row->name] = $this->dm_post::categoryPostNew($row->id, $this->lang_id);
            $data['cat_' . $row->title] = $row->id;
        }
        $data['latest-trail']     = $this->dm_post::getLatestTrail(8); //
        $data['category-posts'] = isset($data['row']->postCategory) ? $data['row']->postCategory->posts->take(6) : null;
        $data['upcoming-trail']   = $this->dm_post::getUpcommingTrail(6);  //Post
        return view(parent::loadView($this->view_path . '.single'), compact('data'));
    }

    //Show Staff Detail
    public function showStaff($id)
    {
        $data['menu'] = Menu::tree();
        $data['row'] = $this->dm_post::getStaffDetail($id);
        //dd($data['row']);
        return view(parent::loadView($this->view_path . '.staff_detail'), compact('data'));
    }
    //Show Page
    public function showPage($post_unique_id)
    {
        $data['menu'] = Menu::tree();
        $data['row'] = $this->dm_post::getSinglePage($post_unique_id);
        return view(parent::loadView($this->view_path . '.single'), compact('data'));
    }

    //to show post category with post archive
    public function showCategoryPost($category_id)
    {
        $data['menu'] = Menu::tree();
        $data['rows'] = $this->dm_post::categoryBasedPost($category_id);
        $data['cat_count'] = count($data['rows']);
        return view(parent::loadView($this->view_path . '.category'), compact('data'));
    }

    //Contact Us
    public function contact()
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.contact'), compact('data'));
    }

    //album
    public function gallery()
    {
        $data['menu'] = Menu::tree();
        $data['gallery'] = Gallery::where('status', '=', 1)->orderBy('id', 'desc')->get();
        return view(parent::loadView($this->view_path . '.gallery'), compact('data'));
    }

    public function search(Request $request)
    {
        // dd($request->all());
        $data['menu'] = Menu::tree();
        $data['location_id'] = $request->get('location_id');
        $data['category_id'] = $request->get('category_id');
        $data['types_id'] = $request->get('types_id');
        $data['rows'] = Blog::where('location_id', 'LIKE', '%' . $data['location_id'] . '%')
            ->Where('category_id', 'LIKE', '%' . $data['category_id'] . '%')
            ->Where('types_id', 'LIKE', '%' . $data['types_id'] . '%')
            ->get();
        //dd($data['rows']);
        $data['cat_count'] = count($data['rows']);
        return view(parent::loadView($this->view_path . '.search'), compact('data'));
    }

    // ----- Sanitizing Laravel Request Inputs -----
    function rip_tags($string)
    {
        // ----- remove HTML TAGs -----
        $string = preg_replace('/<[^>]*>/', ' ', $string);
        // ----- remove control characters -----
        $string = str_replace("\r", '', $string);    // --- replace with empty space
        $string = str_replace("\n", ' ', $string);   // --- replace with space
        $string = str_replace("\t", ' ', $string);   // --- replace with space
        // ----- remove multiple spaces -----
        $string = trim(preg_replace('/ {2,}/', ' ', $string));
        return $string;
    }
    /** Store Message From Contact Us */

    public function storeMessage(Request $request)
    {
        //dd($request->all());
        $row = new Contact();
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|max:255',
            'subject' => 'sometimes|max:255',
            'address' => 'sometimes|max:255',
            'message' => 'sometimes',
        ]);
        $row->name         = $this->rip_tags($request->name);
        $row->email        = $this->rip_tags($request->email);
        $row->number       = $this->rip_tags($request->number);
        $row->subject      = $this->rip_tags($request->subject);
        $row->address      = $this->rip_tags($request->address);
        $row->message      = $this->rip_tags($request->message);
        $success           =  $row->save();
        if ($success) {
            session()->flash('alert-success', $this->panel . ' Message Successfully send.');
        } else {
            session()->flash('alert-danger', $this->panel . ' Something error !.');
        }
        return redirect()->back();
        die;
    }

    /** Donate Message  */

    public function Donate(Request $request)
    {

        // $row = new Contact();
        $request->validate([
            'full_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'address' => 'sometimes|max:255',
            'purpose' => 'sometimes',
            'county'  => 'sometimes',
        ]);

        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'purpose' => $request->purpose,
            'county' => $request->county,
        ];

        // Sending Mail to Owner
        Mail::send('site.emails.contact', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to($this->email);
            $message->subject('Mail From CSD Website');
        });
        // Sending Response To Sender
        Mail::send('site.emails.response', $data, function ($message) use ($data) {
            $message->from($this->email);
            $message->to($data['email']);
            $message->subject('Thankyou !! from CSD');
        });
    }

    public function member(Request $requets){

        return view(parent::loadView($this->view_path.'.member.member'));
    }
    function memberByType($slug){
        $memberType = $this->memberType->where('slug', $slug)->firstOrFail();
        return view(parent::loadView($this->view_path.'.member.member'), compact('memberType'));

    }

    public function filterByLetter(Request $request, $letter)
    {
        $members = Member::with('user') // Eager load the user relationship
            ->whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(company, "$.company_name"))) LIKE ?', [strtolower($letter) . '%'])
            ->get();
        if($request->member_type != null && $request->member_type != ''){
            $members = Member::where('member_type_id', $request->member_type)->with('user') // Eager load the user relationship
            ->whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(company, "$.company_name"))) LIKE ?', [strtolower($letter) . '%'])
            ->get();
        }
        $decodedMembers = $members->map(function ($member) {
            $companyData = json_decode($member->company, true);
            return [
                'id' => $member->id,
                'company' => $companyData['company_name'],
                'member_id' => $member->member_id,
                'user' => [
                    'id' => $member->user->id,
                    'name' => $member->user->name,
                    'email' => $member->user->email,
                    'profile' => $member->user->avatar,
                    // Add other user details as needed
                ]
            ];
        });

        return response()->json($decodedMembers);
    }

    public function filterByKeyword(Request $request){
        $query = $request->get('query');
        $memberTypeId = $request->get('member_type');

        $members = Member::with('user'); // Eager load the user relationship


        if($memberTypeId != null && $memberTypeId != ''){
            $members = Member::where('member_type_id', $request->member_type)->with('user'); // Eager load the user relationship

        }
        $members = $members->whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(company, "$.company_name"))) LIKE ?', [strtolower($query) . '%'])
                    ->orWhere('member_id', 'LIKE', "%{$query}%")
                    ->get();

        $decodedMembers = $members->map(function ($member) {
            $companyData = json_decode($member->company, true);
            return [
                'id' => $member->id,
                'company' => $companyData['company_name'],
                'member_id' => $member->member_id,
                'user' => [
                    'id' => $member->user->id,
                    'name' => $member->user->name,
                    'email' => $member->user->email,
                    'profile' => $member->user->avatar,
                    // Add other user details as needed
                ]
            ];
        });
        return response()->json($decodedMembers);
    }

    public function memberProfile($member_id){
        $member = $this->member->where('member_id', $member_id)->whereHas('user')->with('user')->firstOrFail();
        $posts = null;
        $gallery = null;
        if(isset($member->user)){
            $posts = $this->post->where('user_id', $member->user->id)->where('type', 'post')->select('thumbs', 'title', 'trail_address', 'category_id', 'post_unique_id', 'id', 'created_at')->get();
            $gallery = $this->blogImage->where('user_id', $member->user_id)->latest()->take(6)->get();
        }


        return view(parent::loadView($this->view_path.'.member.member-profile'), compact('member', 'posts', 'gallery'));
    }

    public function memberType($memberType){
        return view(parent::loadView($this->view_path.'.member.general'));
    }

    public function trail(){
        return view(parent::loadView($this->view_path.'.trail.trail'));
    }

    function trailDetails($post_unique_id){
        $post = $this->post->where('post_unique_id', $post_unique_id)->firstOrFail();
        return view(parent::loadView($this->view_path.'.trail.details'), compact('post'));
    }

    function aboutUs($post_unique_id){
        $data['menu'] = Menu::tree();
        $data['row'] = $this->dm_post::getSinglePage($post_unique_id);
        return view(parent::loadView($this->view_path.'.about.about'), compact('data'));
    }

    function faq(){
        return view(parent::loadView($this->view_path.'.faq.faq'));
    }

    function sign_in(){
        return view(parent::loadView($this->view_path.'.login.login'));
    }

    function register(){
        return view(parent::loadView($this->view_path.'.apply-for-membership.membership'));
    }

    function subscribe(Request $request){
        SubscribeMail::create([
            'email' => $request->email,
        ]);

        return redirect()->back();
    }

    // member list


    // member edit
    public function memberEdit($id)
    {
        $data['menu'] = Menu::tree();
        $data['row'] = User::find($id);
        return view(parent::loadView($this->view_path . '.member.member-edit'), compact('data'));
    }


    public function destination($slug){
        $destination = $this->dm_post::getDestinationPosts($slug);
        $data['posts'] = $destination->posts;
        // dd($data['posts']);
        $data['destination'] = $destination;
        return view(parent::loadView($this->view_path.'.destination.destination'), compact('data'));
    }

    public function searchByDestation(Request $request)
    {
        $query = $request->input('query');
        $destination = $request->input('destination');
        $posts = $this->dm_post::searchByDestiantion($query, $destination);
        return response()->json($posts);
    }

    public function organizationChart($post_unique_id){
        $data['menu'] = Menu::tree();
        $data['row'] = $this->dm_post::getSinglePage($post_unique_id);
        return view(parent::loadView($this->view_path.'.about.organization-chart'), compact('data'));
    }

    public function faqs($post_unique_id){
        $data['menu']             = Menu::tree();
        $data['row']              = $this->dm_post::getSinglePage($post_unique_id);
        $data['faq']              = Faq::where('status', '=', 1)->get(); //FAQ
        return view(parent::loadView($this->view_path.'.faq.faq'), compact('data'));
    }
}

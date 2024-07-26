<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class InterviewQuestion extends DM_BaseModel
{
    use HasFactory;
    protected $fillable = [
        'title', 'order'
    ];
    public function getData()
    {
        return $this->orderBy('id', 'ASC')->get();
    }

    public function postCategory()
    {
        return $this->belongsTo(InterviewTypes::class, 'category_id');
    }

    public function getRules()
    {
        $rules = array(
            'title' => 'required|string|max:225|min:2',
            'description' => 'sometimes',
            'status' => 'required|boolean'
        );
        return $rules;
    }
    public function editRules()
    {
        $rules = array(
            'title' => 'required|string|max:225|min:2',
            'description' => 'sometimes',
            'status' => 'required|boolean'
        );
        return $rules;
    }

    public function getCategory()
    {
        $data = DB::table('interview_types')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }

    public function storeData(Request $request, $category_id, $title, $description, $status, $rows)
    {
        //dd($title, $description, $status, $rows);
        $question =                           new InterviewQuestion;
        $question->category_id              = $category_id;
        $question->title                    = $title;
        $question->post_unique_id           = uniqid(Auth::user()->id . '_');
        $question->slug                     = Str::slug($title);
        $question->description              = $description;
        $question->status                   = $status;
        $question->save();
        return true;
    }

    public function updateData(Request $request, $id, $category_id, $title, $description, $status, $rows)
    {
        // dd($title, $category_id, $description, $status, $rows);
        $question =                          InterviewQuestion::findOrFail($id);
        $question->category_id              = $category_id;
        $question->title                    = $title;
        $question->slug                     = Str::slug($title);
        $question->description              = $description;
        $question->status                   = $status;
        $question->save();
        return true;
    }
}

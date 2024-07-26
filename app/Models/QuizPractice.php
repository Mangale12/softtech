<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizPractice extends DM_BaseModel
{
    use HasFactory;
    
    public function getData()
    {
        return $this->orderBy('id', 'ASC')->get();
    }

    public function getRules()
    {
        $rules = array(
            'question' => 'required|string|max:225|min:2',
            'option_a' => 'required|string|max:225|min:2',
            'option_b' => 'required|string|max:225|min:2',
            'option_c' => 'required|string|max:225|min:2',
            'option_d' => 'required|string|max:225|min:2',
            'correct_answer' => 'required|string|max:225|min:2',

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

    public function storeData(Request $request, $question, $option_a, $option_b, $option_c, $option_d, $correct_answer, $rows)
    {
       // dd($question, $option_a, $option_b, $option_c, $option_d, $correct_answer);
        $quiz =                               new QuizPractice;
        $quiz->question                        = $question;
        $quiz->option_a                        = $option_a;
        $quiz->option_b                        = $option_b;
        $quiz->option_c                        = $option_c;
        $quiz->option_d                        = $option_d;
        $quiz->correct_answer                  = $correct_answer;
        $quiz->status                          = 1;
        $quiz->save();
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
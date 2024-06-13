<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingPerson extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'address'];
    public function getData()
    {
        return $this->orderBy('id', 'ASC')->paginate(5);
    }

    public function getRules()
    {
        $rules = array(
            'title'       => 'required|string|max:225|min:2',
            'status'      => 'required|boolean'

        );
        return $rules;
    }

    /**
     * / Custom message for validation
     */
    public function getMessage()
    {
        $rules = array(
            'title.required'                          => 'नाम अनिवार्य छ ।',
        );
        return $rules;
    }

    // public function trainings()
    // {
    //     return $this->belongsToMany(Talim::class, 'person_training');
    // }

    public function trainings()
    {
        return $this->belongsToMany(Talim::class, 'person_training')
                    ->withPivot('training_phase_id')
                    ->withTimestamps();
    }
    public function phases()
    {
        return $this->belongsToMany(TrainingPhase::class, 'person_training_phase')
                    ->withPivot('talim_id')
                    ->withTimestamps();
    }

}

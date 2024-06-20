<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingPhase extends Model
{
    use HasFactory;
    protected $fillable = ['talim_id', 'name', 'description'];
    public function training()
    {
        return $this->belongsTo(Talim::class);
    }

    public function persons()
    {
        return $this->belongsToMany(TrainingPerson::class, 'person_training')
                    ->withPivot('talim_id')
                    ->withTimestamps();
    }

}

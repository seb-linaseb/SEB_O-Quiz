<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /*
        Ici comme ma table s'appel Questions,
        je respecte la convention de Eloquent
        (qui dit model au singulier/table au pluriel)
        je ne suis donc pas obligé de préciser le nom de la table
    */
    // protected $table = 'questions';

    // Je souhaite acceder au quiz auquel appartient ma question
    // depuis mon Model "Question"
    public function quiz()
    {
        return $this->belongsTo('App\Models\Quiz', 'quizzes_id');
    }

    // Je souhaite acceder au niveau de chaque question
    public function level()
    {
        return $this->belongsTo('App\Models\Level', 'levels_id');
    }

    public function answer()
    {
        return $this->hasMany('App\Models\Answer', 'questions_id');
    }
}
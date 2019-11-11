<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizzes';

    // Je souhaite acceder à l'auteur de mon quiz,
    // depuis mon Model "Quiz"
    public function author()
    {
        // Je déclare ainsi a Eloquent,
        // une relation entre mes deux models.
        // Afin que Eloquent, comprenne comment la relation se fait,
        // je lui précise en 2em argument, le nom
        // du champ faisant office de clé étrangere entre mes 2 tables
        return $this->belongsTo('App\Models\Author', 'app_users_id');
    }

    // Je souhaite acceder aux questions de mon quiz,
    // depuis mon Model "Quiz"
    public function question()
    {
        return $this->hasMany('App\Models\Question', 'quizzes_id');
    }

    public function tag()
    {
        /*
            Comme un quiz à plusieurs tags
            et que un tag à plusieurs quizs
            j'ai donc une relation N/N
            ManyToMany https://laravel.com/docs/5.8/eloquent-relationships#many-to-many

            La méthode de Eloquent à appeler est "belongsToMany"

            Comme je ne respecte pas à 100% les conventions de nomage de Eloquent,
            Je vais spécifier à Eloquent comment la relation fonctionne.

            1er argument: le nom du model
            2em argument: le nom de la table de liaison
            3em argument: le nom du champ faisant office de clé étrangere
            4em argument: le nom de l'autre champ faisant office de clé étrangere
        */
        return $this->belongsToMany('App\Models\Tag', 'quizzes_has_tags', 'quizzes_id', 'tags_id');
    }
}
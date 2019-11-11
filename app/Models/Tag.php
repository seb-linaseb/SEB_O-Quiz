<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /*
        Ici comme ma table s'appel tags,
        je respecte la convention de Eloquent
        (qui dit model au singulier/table au pluriel)
        je ne suis donc pas obligé de préciser le nom de la table
    */
    protected $table = 'tags';

    public function quiz()
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
        return $this->belongsToMany('App\Models\Quiz', 'quizzes_has_tags', 'tags_id', 'quizzes_id');
    }
}
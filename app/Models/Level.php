<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    /*
        Ici comme ma table s'appel levels,
        je respecte la convention de Eloquent
        (qui dit model au singulier/table au pluriel)
        je ne suis donc pas obligé de préciser le nom de la table
    */
    // protected $table = 'levels';

    public function getCssClass()
    {
        $css_class_name = '';

        switch($this->id){
            case 1:
                $css_class_name = 'beginner';
                break;
            case 2:
                $css_class_name = 'medium';
                break;
            case 3:
                $css_class_name = 'expert';
                break;
        }

        return 'level--' . $css_class_name;
    }
}
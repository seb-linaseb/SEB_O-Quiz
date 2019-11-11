<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Quiz;

class TagController extends Controller
{
  public function listTag()
  {
        // Tag::all() me retourne tous les tags
        $tagCollection = Tag::all();

        return view('tag/list_tag', [
            'tagCollection' => $tagCollection
        ]);
 }

 public function tagAction($tagId)
 {

    $quizCollection = Tag::find($tagId)->quiz;

       return view('tag/tag', [
           'quizCollection' => $quizCollection
       ]);
}
}
<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Utils\UserSession;

class MainController extends Controller
{
  public function homeAction()
  {
        // Quiz::all() me retourne tous les quiz
        // ->shuffle() mélange tout
        $quizCollection = Quiz::all()->shuffle();

        return view('main/home', [
            'quizCollection' => $quizCollection
        ]);
 }
 public function adminAction()
 {
     if (!UserSession::isAdmin()) {

         abort(403);
     }

     return view('admin');
 }
 
}
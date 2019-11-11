<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Utils\UserSession;


class QuizController extends Controller
{
    /**
     * Méthode qui permet l'affichage d'un quiz
     *
     * @return void
     */
    public function quizAction(Request $request, $quizId)
    {

        /*
            Dans ma vue je vais avoir besoin de plusieurs informations:
                Le quiz que je souhaite afficher (en fonction de son ID)
                Les questions du quiz
                Le niveau de chaque question du quiz
        */

        // Je commence par récuperer le quiz dont l'id m'a été donné dans l'url
        $quizModel = Quiz::find($quizId);

        // Je vérifie que le quiz existe bien !
        if (empty($quizModel)) {

            /* Si le quiz n'existe pas c'est que:
                Soit Ben'Oclock a codé le site avec ses pieds...
                Soit un petit malin a changé les url manuellement !

                Du coup, quoi qu'il arrive, je redirige vers la home !
            */
            return redirect()->route('home');
        }

        // $questionCollection = $quizModel->question;

        // dump($quizModel);
        // dump($questionCollection);
        // die();
        if (!UserSession::isConnected()) {
            return view('quiz/quiz', [
                'quizModel' => $quizModel
            ]);
        }
        else {
            return view('quiz/quizJeu', [
                'quizModel' => $quizModel
            ]);
        }
    }

    public function quizPost()
    {
        $quizGame = $_POST;

       $score = 0;
        foreach ($quizGame as $questionId => $answerId)
        {

            if ($questionId == $answerId)
            {
                $score++;
                $result = "BONNE REPONSE";
            } else {
                $result = "MAUVAISE REPONSE";
                $solution = "La bonne réponse était : ";
            }
        }
        return view('quiz/quizResult', [
            'score' => $score,
            'result' => $result,
            'solution' => $solution
        ]);
    }
}

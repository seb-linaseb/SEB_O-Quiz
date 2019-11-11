<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Utils\UserSession;

class UserController extends Controller
{
  public function signupAction()
  {
  return view('user/signup');
  }

  public function signupPost(Request $request)
  {
      // Pour le moment je n'ai aucune erreur !
      // Je créé un tableau d'erreur vide
      $errorList = [];
      // Je récupere mes champs en provenance du formulaire
      $firstname = $request->input('firstname');
      $lastname = $request->input('lasttname');
      $email = $request->input('email');
      $password = $request->input('password');
      $conf_password = $request->input('conf_password');

      // TODO: Tester les champs & gérer les messages d'erreurs...
      
      if (empty($firstname)) {

          $errorList['firstname'] = 'Le prénom doit être enregistré';
      }
      if (empty($lastname)) {

        $errorList['lasttname'] = 'Le nom doit être enregistré';
      }
      if (empty($email)) {

        $errorList[] = 'Email vide';

      // http://php.net/manual/fr/function.filter-var.php
      } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

          $errorList[] = 'Email incorrect';
      }      

      if (empty($password)) {

        $errorList['password'] = 'Merci de renseigner votre mot de passe';
      }
      if (strlen($password) < 8) {

        $errorList[] = 'Le mot de passe doit faire au moins 8 caractères';
      }
      if (empty($conf_password)) {

        $errorList['conf_password'] = 'Merci de confirmer votre mot de passe';
      }
      if ($password != $conf_password) {

        $errorList['verif_password'] = 'Les mots de passe sont différents';
      }

      // SI je n'ai aucune erreur...
      if (empty($errorList)) {

                // Vérification compte existant

      /*
          Je demande donc à éloquent de me trouver en BDD
          les utilisateurs qui ont leur champ "email" égal à $email.
          Eloquent, me répond toujours avec un objet Collection.
          Je demande donc à Collection donne moi ton premier résultat.
          Si il y a un résultat, j'obtiendrai un objet de type User.
          Si il n'y en a pas, j'obtiendrai un NULL.
      */
      $user = User::where('email', '=', $email)->first();

      if ($user) {

          $errorList[] = 'Un compte avec cet email existe déjà';

      } else {

          // Encode via bcrypt (default) : http://php.net/manual/fr/function.password-hash.php
          $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

          // Nouvelle instance de ma classe User

          // Je créé un nouveau model utilisateur vide !
          $new_user = new User();

          // Je lui assigne les valeurs en provenance du formulaire
          $new_user->firstname = $firstname;
          $new_user->lastname = $lastname;
          $new_user->email = $email;
          $new_user->password = password_hash($password, PASSWORD_BCRYPT);

          // Méthode qui update en cas d'existant
          // et qui insert en cas de nouveau
                $new_user->save();

          /*
          Par défaut, Eloquent s'attend à ce que j'ai des champs:
              'updated_at'
              'created_at'

          Pour éviter les erreurs, j'ajoute dans mon model
              public $timestamps = false;
          */


        // Redirect login
          return redirect()->route('signin');

        }
      }

      return view('user/signup', [
          'errorList' => $errorList,
          'values' => [
              'firstname' => $firstname,
              'lasttname' => $lastname,
              'email' => $email
              // Note: pas de password (sécurité)
          ]
      ]);
  }

  public function signinAction()
  {
  return view('user/signin');
  }

  public function signinPost(Request $request)
  {
      $errorList = [];

      $email = trim($request->input('email', ''));
      $password = trim($request->input('password', ''));

      if (empty($email)) {

          $errorList[] = 'Email vide';

      } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

          $errorList[] = 'Email incorrect';
      }

      if (empty($password)) {

          $errorList[] = 'Mot de passe vide';
      }

      // if (strlen($password) < 8) {

          // $errorList[] = 'Le mot de passe doit faire au moins 8 caractères';
      // }

      if (empty($errorList)) {

          // Test si le compte existe
          $user = User::where('email', '=', $email)->first();

          // Si j'ai bien un user...
          if ($user) {

              // https://www.php.net/manual/fr/function.password-verify.php
              /*
                  La fonction de php password_verify va prendre 2 arguments
                  1er: le mdp saisi à vérifier (saisi par l'utilisateur)
                  2em: le mdp hashé présent en BDD

                  La fonction va hasher le 1er argument et le comparer avec le 2eme

                  Si ils sont identiques, alors c'est que le mdp saisi est le bon
                  Si ils sont différents, alors c'est que le mdp saisi est incorrect
              */
              if (password_verify($password, $user->password)) {

                  // Je connecte mon utilisateur grace à la méthode "connect"
                  // de mon objet UserSession
                  UserSession::connect($user);

                  return redirect()->route('home');

              } else {

                  $errorList[] = 'L\'identifiant et/ou mot de passe incorrect';
              }

          // sinon...
          } else {

              $errorList[] = 'L\'identifiant et/ou mot de passe incorrect';
          }
      }

      return view('user/signin', [
          'errorList' => $errorList,
          'values' => [
              'email' => $email
              // Note: pas de password (sécurité)
          ]
      ]);
  }

  public function loggoutAction()
  {
      UserSession::disconnect();

      return redirect()->route('signin');
  }

  public function accountAction()
  {
      return view('user/account');
  }
}

<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\App_users;
use App\Utils\UserSession;

//j'extends du controller parent controller
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       parent::__construct();
    }

    public function signup(Request $request) {
              
        return view('signup', [
 
        ]);
    }

    public function signin(Request $request) {

        return view('signin', [
 
        ]);
    }

    public function account(Request $request) {
      
        return view('account', [
 
        ]);
    }

    public function signupPost(Request $request) {
        $errorList = [];

         $firstname = $request->input('firstname', '');
         $lastname = $request->input('lastname', '');
         $email = $request->input('email', '');
         $password = $request->input('password', '');
         // $status = $request->input('status', 1);

         $email = trim($email);
         $password = trim($password);
         
        if(empty($firstname)){
            $errorList[] = 'Vous devez renseigner votre prénom';
        }
        if(empty($lastname)){
            $errorList[] = 'Vous devez renseigner votre nom';
        }
         if(empty($email)){
            $errorList[] = 'email vide';
        } elseif(filter_var($email, FILTER_VALIDATE_EMAIL) === false) { 
            $errorList[] = 'format d\'email invalide';
        }
        if(empty($password)){
            $errorList[] = 'password vide';
        }elseif(strlen($password) < 8 ){
            $errorList[] = 'le mot de passe doit contenir au moins 8 caractères';
        }

        if(empty($errorList)){
        $user = new App_users();
        $password = password_hash($password, PASSWORD_DEFAULT);
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->email = $email;
        $user->password = $password;
        $user->status = $status;
        $user->save();

        return view('signin');
    }
    return view('signup', ['errorList' =>$errorList]);
    }

    public function signinPost(Request $request) {
        $errorList = [];
        $email = $request->input('email', '');
        $password = $request->input('password', '');

        $email = trim($email);
        $password = trim($password);
        
        if (empty($email)) {
            $errorList[] = 'Mot de passe ou utilisateur invalide';
        }

        else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $errorList[] = 'Mot de passe ou utilisateur invalide';
        }

        if (empty($password) || strlen($password) < 8) {

            $errorList[] = 'Mot de passe ou utilisateur invalide';
        }

        if (empty($errorList)) {


        $user = App_users::where('email', '=', $email)->get()->first();
        
        
            if (!is_null($user)){
                if (password_verify($password, $user->password)){
                     UserSession::connect($user);
                                     
                    return redirect()->route('home');

                } else {
                    $errorList[] = 'L\'identifiant et/ou mot de passe incorrect';
                }
            } else {
                $errorList[] = 'L\'identifiant et/ou mot de passe incorrect';

            }
        }

        return view('signin', ['errorList' => $errorList]);
   }

   public function logout(Request $request) {

       UserSession::disconnect();
       return redirect()->route('home');
   }
}
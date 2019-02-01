<?php
//ici je declare le namespace de mon controller qui se situe a cet endroit
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Quizzes;
use App\App_users;
use App\Tags;
use App\Utils\UserSession;

// use App\Platform;

//j'extends du controller parent controller
class MainController extends Controller
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

    public function home(Request $request) {

        $quizzList = Quizzes::all();
        $users = App_users::all();
        $userList = [];
        // $order = $request->input('order');
        foreach($users as $user){
            $userList[$user->id] = $user->firstname . ' ' . $user->lastname; 
        }
        return view('home', [
            'quizzList' => $quizzList,
            'userList' => $userList
        ]);
    }

  


}

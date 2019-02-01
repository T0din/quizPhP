<?php
//ici je declare le namespace de mon controller qui se situe a cet endroit
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Quizzes;
use App\App_users;
use App\Tags;
use App\Utils\UserSession;

class AdminController extends Controller
{

    // public function __construct()
    // {
    //    parent::__construct();
    // }

    public function admin() {
        return view('admin');
    }
    public function adminTag(Request $request) {

        $tags = Tags::all();
        return view('adminTag', [

            'tags' => $tags
        ]);
    }
    public function adminQuizz(Request $request) {
        $quizzList = Quizzes::all();

        return view('adminQuizz', [
            'quizzList' => $quizzList,
        ]);
    }

    public function adminUser(Request $request) {
        $users = App_users::all();
        $userList = [];
        foreach($users as $user){

            $userList[$user->id] = $user->firstname . ' ' . $user->lastname; 
        }
        return view('adminUser', [
        'userList' => $userList,

        ]);
    }

    public function adminPostTagAdd(Request $request) {
        $tag = new Tags;
        $tag->name = $request->input('name');
        if (null !==($request->input('status'))) {
        $tag->status = $request->input('status');
        } else {
            $tag->status = 0;
        }
        $tag->save();

         return redirect()->route('adminTag');
    }

    public function adminPostTagUpdate(Request $request) {
        $tagId = intval($request->input('tag'));
        $name = $request->input('name');
        $status = $request->input('status');
        Tags::find($tagId)->update(['name'=> $name, 'status'=> $status]);
        return redirect()->route('adminTag');
    }

    public function adminPostTagDelete(Request $request) {
        $tagId = intval($request->input('tag'));
        Tags::find($tagId)->delete();
        return redirect()->route('adminTag');
    }


    // A partir de là, il va falloir ajouter / modifier des champs pour rendre les méthodes valables pour quizz et users
    // vu que tout ça a été c/c des tags.
    // Par ailleurs, il faut aussi aller modifier les views en conséquence pour ajouter les champs.

    public function adminPostQuizzAdd(Request $request) {
        $quizz = new Quizzes;
        $quizz->title = $request->input('title');
        if(!empty($quizz->title)) {
            $quizz->description = $request->input('description');
            if(!empty($quizz->description)) {
                UserSession::getUser()->id;
                $quizz->app_users_id = UserSession::getUser()->id;
                if (null !==($request->input('status'))) {
                $quizz->status = $request->input('status');
                } else {
                    $quizz->status = 0;}        
            } 
            else {
                return redirect()->route('adminQuizz');       
            }
        }  else {
            return redirect()->route('adminQuizz');      
        } 
        $quizz->save();
         return redirect()->route('adminQuizz');
    }

    public function adminPostQuizzUpdate(Request $request) {
        $quizzId = intval($request->input('quizz'));
        $title = $request->input('title');
        $status = $request->input('status');
        Tags::find($quizzId)->update(['title'=> $title, 'status'=> $status]);
        return redirect()->route('adminQuizz');
    }

    public function adminPostQuizzDelete(Request $request) {
        $quizzId = intval($request->input('quizz'));
        Tags::find($quizzId)->delete();
        return redirect()->route('adminQuizz');
    }

    public function adminPostUserAdd(Request $request) {
        $user= new App_users;
        $user->firstname = $request->input('firstname');
        //TODO 
        if (null !==($request->input('status'))) {
        $user->status = $request->input('status');
        } else {
            $user->status = 0;
        }
        $user->save();

         return redirect()->route('adminQuizz');
    }

    public function adminPostUserUpdate(Request $request) {
        $userId = intval($request->input('user'));
        $firstname = $request->input('firstname');
        $status = $request->input('status');
        Tags::find($tagId)->update(['firstname'=> $firstname, 'status'=> $status]);
        return redirect()->route('adminUser');
    }

    public function adminPostUserDelete(Request $request) {
        $userId = intval($request->input('user'));
        Tags::find($userId)->delete();
        return redirect()->route('adminUser');
    }

}

?>
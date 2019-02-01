<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Quizzes;
use App\App_users;
use App\Questions;
use App\Levels;
use App\Answers;
use App\Tags;
use App\Quizzes_has_tags;
use App\Utils\UserSession;

// use Illuminate\Routing\Controller;

// use App\Videogame;
// use App\Platform;

//j'extends du controller parent controller
class QuizzController extends Controller
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

    public function consulter(Request $request) {

        $order = $request->input('order');

        return view('consulter', [
        ]);
    }

    public function quizz(Request $request) {

        $order = $request->input('quizz');
        
        return view('quizz', [
        ]);
    }

    // GROS TODO : faire des variables intermédiaires pour éviter les foreach, les créations de variables et
    // calculs / manipulations de données dans les vues -> à modifier !!! 
    public function quizzId(Request $request, $id) {
        $quizzIdInfo = Quizzes::findOrFail($id);
        //dd($quizzIdInfo);
        //$quizzIdInfo = DB::select('select * from quizzes where id = :id', ['id' => $id]);

       // $questionsList = DB::select('select * from questions where quizzes_id = :id', ['id' => $id]);
       $questionsList = Questions::where('quizzes_id', '=', $quizzIdInfo->id)->get();
       $answers = $this->getRandomizedAnswers($questionsList );
        $userList = App_users::find($quizzIdInfo->app_users_id);
        $difficulty = Levels::all();
        $levelList = [];
        foreach($difficulty as $level){
            $levelList[$level->id] = $level->name;
        }
        // $order = $request->input('quizz');


        return view('quizz', [
            'quizzIdInfo' => $quizzIdInfo,
            'userList' => $userList,
            'questionsList' => $questionsList,
            'levelList' => $levelList,
            'answers' => $answers
        ]);
    }

    public function getRandomizedAnswers($questions) {
        $questionAnswerList = [];

        foreach($questions as $question){

            $answers = Answers::where('questions_id', '=', $question->id)->get()->shuffle();

            $questionAnswerList[$question->id]= $answers;
            
        }
    
        return $questionAnswerList;
    }

    public function tags(Request $request) {
        $tagsList = Tags::all();
        return view('tags', [
            'tags' => $tagsList
            ]);
    }

    public function listByTag(Request $request, $id) {
        $tagsList = Tags::all();
        $tagsIdInfo = DB::select('select * from tags where id = :id', ['id' => $id]);
        // faire un inner join avec la table intermédiaire
        $quizzByTag = DB::select('select * from quizzes inner join quizzes_has_tags on quizzes.id = quizzes_has_tags.quizzes_id 
        where quizzes_has_tags.tags_id = :id', ['id' => $id]);
        return view('listQuizzByTag', [
            'tagsIdInfo' => $tagsIdInfo,
            'quizzByTag' => $quizzByTag,
            'tags' => $tagsList
            ]);

    }
    public function quizzPostId (Request $request, $id) {        
        $quizzIdInfo = Quizzes::findOrFail($id);
       $questionsList = Questions::where('quizzes_id', '=', $quizzIdInfo->id)->get();
       $answers = $this->getRandomizedAnswers($questionsList );
        $userList = App_users::find($quizzIdInfo->app_users_id);
        $difficulty = Levels::all();
        $levelList = [];
        foreach($difficulty as $level){
            $levelList[$level->id] = $level->name;
        }
        $answersChosen = [];

        foreach ($questionsList as $question) {
           $answersChosen[$question->id] = $request->input('radio'.$question->id);

        }


        return view('quizzScore', [
            'quizzIdInfo' => $quizzIdInfo,
            'userList' => $userList,
            'questionsList' => $questionsList,
            'levelList' => $levelList,
            'answers' => $answers,
            'answersChosen' => $answersChosen
        ]);

    }
}
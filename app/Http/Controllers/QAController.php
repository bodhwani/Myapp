<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;

use Illuminate\Support\Facades\Auth;


class QAController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        $questions = Question::all();


        return view('questions.index', compact('questions'));
    }

    public function ask(Question $question){



        return view('questions.ask');
    }

    public function upload(Request $request){

        $question = new Question;

        $question->title = $request->title;
        $question->tags = $request->tags;
        $question->subject = $request->subject;
        $question->chapter = $request->chapter;
        $question->description = $request->description;
        $question->image= $request->image;



        $id = Auth::user()->id;
        $question->addQuestion($question , $id);
        
        $question->save();

        return redirect('/');

    }

    public function show(Question $question){

       //  $question = Question::with('answers.user')->find(1);


        $question->load('answers.user');
        //return $question;

        return view('questions.show', compact('question'));
    }

    public function addQ(Request $request)
    {
        return $request->all();

    }
}

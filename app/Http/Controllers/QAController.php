<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;

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

    public function ask(){

        return view('questions.ask');
    }

    public function upload(Request $request, Question $question){

        $question = new Question;

        $question->title = $request->title;
        $question->tags = $request->tags;
        $question->subject = $request->subject;
        $question->chapter = $request->chapter;
        $question->description = $request->description;
        $question->image= $request->image;

        $question->save();

        return redirect('/');

    }

    public function show(Question $question){

//        $question = Question::with('answers.user')->find(1);


        $question->load('answers.user');

        return view('questions.show', compact('question'));
    }

    public function addQ(Request $request)
    {
        return $request->all();

    }
}

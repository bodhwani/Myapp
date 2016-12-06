<?php
namespace App\Http\Controllers;
use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Auth;



class AnswersController extends Controller
{
    public function showans(Request $request, Question $question){
        $this->validate($request, [
            'body' => 'required|min:10',
            'email' => 'email|unique:users,email',
            'cell_no' => 'min:10'
        ]);
        $answer = new Answer($request->all());


        
        $id = Auth::user()->id;
        $question->addAnswer($answer , $id);
        return back();
    }


    public function edit(Answer $answer){
        return view('answers.edit', compact('answer'));
    }
    public function update(Request $request, Answer $answer){
        $temp = $request->all();
        $answer->update($temp);
        return back();
    }
}
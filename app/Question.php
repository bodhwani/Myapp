<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Question extends Model
{

    protected $fillable = ['title', 'chapter', 'subject', 'tags','description', 'image'];


    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function addAnswer(Answer $answer , $userID){
        $answer->user_id = $userID;
        return $this->answers()->save($answer);
    }


    public function path(){

        return '/questions/'.$this->id;
    }
}

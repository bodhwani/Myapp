@extends('questions.layout')

@section('content')


    <div class="gallery">
        <div class="container">
            <form action="/answers/{{ $answer->id }}" method="POST" >
                {{ method_field('PATCH') }}
                <p><input required type="text" name="body" value="" placeholder="{{ $answer->body }}"></p>
                <p><input type="submit" value="Update Answer" class="btn  btn-primary "/></p>
                <input type="hidden"  value="{{ Session::token() }}" name="_token" />
            </form>
        </div>
    </div>

    @stop
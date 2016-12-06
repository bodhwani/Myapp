@extends('questions.layout')

@section('content')

<div class="gallery">
    <div class="container">
        <form action="/questions/upload" method="POST" class="form-signin">
            <p><input required type="text" name="title" value="" placeholder="Title"></p>
            <p><input required type="text" name="tags" value="" placeholder="Tags"></p>
            <p><input required type="text" name="subject" value="" placeholder="Subject"></p>
            <p><input required type="text" name="chapter" value="" placeholder="Chapter"></p>
            <p><input required type="text" name="description" value="" placeholder="Description"></p>
            <p><input required type="text" name="image" value="" placeholder="Image"></p>
            <p><input type="submit" value="Upload" class="btn  btn-primary "/></p>
            <input type="hidden"  value="{{ Session::token() }}" name="_token" />

        </form>
    </div>
</div>

    @endsection
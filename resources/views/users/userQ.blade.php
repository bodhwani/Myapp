@extends('questions.layout')


@section('content')


<div class="gallery">
    <div class="container">

        <div class="col-md-12">
            <div class="page-content">
                <h2>My Questions</h2>

                @foreach($user->questions as $question)
                <h3>{{ $question->title}}</h3>

                @endforeach

                <div class="clearfix"></div>

            </div><!-- End page-content -->
        </div>

    </div>
</div>

    @endsection

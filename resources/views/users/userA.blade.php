@extends('questions.layout')


@section('content')


    <div class="gallery">
        <div class="container">

            <div class="col-md-12">
                <div class="page-content">
                    <h2>My Answers</h2>

                    @foreach($user->answers as $answer)
                        <h3>{{ $answer->body}}</h3>

                    @endforeach

                    <div class="clearfix"></div>

                </div><!-- End page-content -->
            </div>

        </div>
    </div>

@endsection

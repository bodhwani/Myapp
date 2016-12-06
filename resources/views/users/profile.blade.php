


@extends('questions.layout')

@section('content')

    <div class="gallery">
        <div class="container">

            <div class="col-md-12">
                <div class="page-content">
                    <h2>My Profile</h2>
                    <h3>About {{ $user->name }}</h3>
                    <div class="user-profile-img"><img width="60" height="60" src="https://www.winuall.com/user-data/default.jpg" alt="Vinit Bodhwani"></div>
                    <div class="ul_list ul_list-icon-ok about-user">
                        <ul>
                            <li>{{ $user->email }}</li>
                        </ul>
                    </div>
                    <div class="author-bio">
                        No Bio Mentioned!

                    </div>
                    <div class="clearfix"></div>

                </div><!-- End page-content -->
            </div>

        </div>
    </div>

@endsection



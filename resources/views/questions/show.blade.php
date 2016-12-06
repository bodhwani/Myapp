
@extends('questions.layout')

@section('show')

    <div class="content">
        <div class="section-warp ask-me">
            <div class="container clearfix">
                <div class="box_icon box_warp box_no_border box_no_background" box_border="transparent" box_background="transparent" box_color="#FFF">
                    <div class="row">
                        <div class="col-md-3">
                            <h2 style="color: black">Welcome to Winuall!</h2>

                            <p style="color: black"> The Catalyst in the Intellectual Pursuit of your Dreams.<br>A One stop solution for <b>Physics,
                                    Chemistry, Maths</b><br>Get answer to all your doubts at <b>Winuall</b> by the Experts.
                                We have Experts for you to solve your problems, be it an easy one or a difficult one!
                            </p>

                            <h1>Individual  Questions</h1>




                            <section class="container main-content">
                                <div class="row">
                                    <div class="col-md-9">

                                        <div class="tabs-warp question-tab">

                                            <div class="tab-inner-warp">
                                                <div class="tab-inner" id="recent-questions">

                                                </div>
                                            </div>
                                            <div class="tab-inner-warp">
                                                <div class="tab-inner" id="physics">

                                                </div>
                                            </div>
                                            <div class="tab-inner-warp">
                                                <div class="tab-inner" id="chemistry">

                                                </div>
                                            </div>
                                            <div class="tab-inner-warp">
                                                <div class="tab-inner" id="maths">

                                                </div>
                                            </div>
                                        </div><!-- End page-content -->            </div><!-- End main -->

                                </div><!-- End row -->
                            </section>


                            <p style="color: black"> Q-{{ $question->id }}  {{ $question->title }}</p>

                            @foreach($question->answers as $answer)

                                <ul>
                                    <li><a href="/answers/{{ $answer->id }}/edit">{{ $answer->body }}</a> </li>

                                    <p style="color: black">Submitted by :<a href="#">{{ $answer->user->name }}</a></p>

                                </ul>

                            @endforeach

                            <div class="gallery">
                                <div class="container">
                                    <form action="/questions/{{ $question->id }}/answers" method="POST" class="form-signin">
                                        <p><input  type="text" name="body" value="{{ old('body') }}" placeholder="Answer" ></p>
                                        <p><input type="submit" value="Upload" class="btn  btn-primary "/></p>
                                        <input type="hidden"  value="{{ Session::token() }}" name="_token" />
                                    </form>

                                    @if(count($errors))
                                        <ul>

                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>

                                            @endforeach
                                        </ul>


                                    @endif

                                </div>
                            </div>




                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-9" >

                        </div><!-- End row -->
                    </div><!-- End box_icon -->
                </div><!-- End container -->
            </div><!-- End section-warp -->





            @stop
















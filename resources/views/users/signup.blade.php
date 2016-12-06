<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Sign-Up/Login Form</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../../css/users/normalize.css">


    <link rel="stylesheet" href="../../css/users/style.css">




</head>

<body>

<div class="form">

    <h1>Welcome to Winuall</h1>


    <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
    </ul>

    <div class="tab-content">
        <div id="signup">

            <form action="/signup" method="post">

                <div class="top-row">
                    <div class="field-wrap">
                        <label>
                            Username<span class="req">*</span>
                        </label>
                        <input type="text" name="username" required autocomplete="off" />
                    </div>

                    <div class="field-wrap">
                        <label>
                            Email<span class="req">*</span>
                        </label>
                        <input type="email" name="email" required autocomplete="off"/>
                    </div>
                </div>

                    <div class="field-wrap">
                        <label>
                            Set A Password<span class="req">*</span>
                        </label>
                        <input type="password" name ="password" required autocomplete="off"/>
                    </div>

                    <div class="field-wrap">
                        <label>
                            Contact No<span class="req">*</span>
                        </label>
                        <input  name="cell_no" required autocomplete="off"/>
                    </div>

                <input type="hidden"  value="{{ Session::token() }}" name="_token" />


                <button type="submit" class="button button-block"> Get Started </button>

            </form>

            @if(count($errors))
                <ul>

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>

                    @endforeach
                </ul>


            @endif

        </div>


        {{--LOGIN--}}


        <div id="login">
            <h1>Welcome Back!</h1>

            <form action="/signin" method="post">

                <div class="field-wrap">
                    <label>
                        Email<span class="req">*</span>
                    </label>
                    <input type="email" name="email" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input type="password" name="password" required autocomplete="off"/>
                </div>

                <input type="hidden"  value="{{ Session::token() }}" name="_token" />

                <button type = "submit" class="button button-block"> Log In</button>

            </form>

            @if(count($errors))
                <ul>

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>

                    @endforeach
                </ul>


            @endif

        </div>

    </div><!-- tab-content -->

</div> <!-- /form -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>




</body>
</html>

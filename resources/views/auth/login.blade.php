<!-- 
 * parallax_login.html
 * @Author original @msurguy (tw) -> http://bootsnipp.com/snippets/featured/parallax-login-form
 * @Tested on FF && CH
 * @Reworked by @kaptenn_com (tw)
 * @package PARALLAX LOGIN.
-->

<!-- Bootstrap -->
<link href="{{url()}}/lib/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{url()}}/lib/jquery-1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{url()}}/lib/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

<link href="{{url()}}/css/login.css" rel="stylesheet">
<!--<script src="js/login.js"></script>-->
<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
      
<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
        <div class="container">
            <div class="card card-container">
                <img id="profile-img" class="profile-img-card" src="{{url()}}/img/login/avatar_2x.png" />
                <p id="profile-name" class="profile-name-card"></p>
                <form class="form-signin" role="form" method="POST" action="{!! route('login.auth') !!}">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="email" id="inputEmail" name="login" class="form-control" placeholder="Email address" required autofocus>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
                </form><!-- /form -->
                
                <div class="input-group">
                  <a href="#">¿Has olvidado tu contraseña?</a>
                </div><!-- /input-group -->

                <div class="input-group">Regístrate 
                  <a href="{{!! route('register.partner') !!}}"> aquí</a>
                </div><!-- /input-group -->
                
            </div><!-- /card-container -->
        </div><!-- /container -->
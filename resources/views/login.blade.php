<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/signin.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Sacramento|Cinzel|Montserrat">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
  </head>

  <body class="text-center">
    <form class="form-signin">
      gradient      <h1 class="h3 mb-3 font-weight-normal">Please SignIn</h1>
      <div class="form-group">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control p-1" placeholder="Email address" required  >
      </div>
      <div class="form-group">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control p-1" placeholder="Password" required>
      </div>
      <div class="checkbox  mb-3">
        <label class="fs-6 text-danger signin_err" style="font-family: Montserrat !important; display:none; font-size:12px; background-color: #ffffff59;  border-radius: 2px; padding: 3px 64px;"></label>
      </div>
      <button class="btn btn-sm btn-primary btn-block signin_btn" type="submit">Sign in</button>
      <p class="mt-5 mb-3  text-light" style="font-family: Cinzel !important; font-weight:100; font-size:11px">&copy; Living Praise Worship Centre,</p>
      <p class=" text-light" style="font-family: Cinzel !important; font-weight:100;margin-top: -12px; font-size:12px"> Assemblies of God</p>

    </form>
  </body>
  <script src="{{asset('js/jquery.js')}}"></script>
  <script>
    $(document).ready(function(){ 

    $('#inputPassword').on('click',function(){
      var x = $("#inputPassword")[0];
        x.type = "text";
        setTimeout(function(){
          x.type = "password";
        }, 3000)
    })

    $('.signin_btn').on('click', function(e){
      e.preventDefault()
      $.ajax({
        type: 'post',
                url: 'api/login',
                data:{
                'email' : $('#inputEmail').val(),
                'password': $('#inputPassword').val()
                },
                datatype:'json',
                success: function(data)
                {
                  token = data.access_token
                  window.localStorage.setItem('access_token',token)
                  window.location = '/'
                },
                error: function(data){
                  $('.signin_err').html( `<i class="fas fa-exclamation-triangle"></i>  ${data.statusText}`)
                  $('.signin_err').fadeIn(500)
                  $('.signin_err').fadeOut(3000)
                  
                }
        })
    })

  })
  </script>
</html>

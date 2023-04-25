<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center HTML5 Template</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
  <style>
    .hide{
      display: none;
    }
    .show{
      display: block;
    }
    .test2
    {
      color:white;
    }
    .test2:hover
  {
    color: white;
    background-color: #00785b;
  }
  </style>
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('index')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('index')}}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('index')}}">Find A Doctor</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('index')}}">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('index')}}">Contact</a>
            </li>

            @if(Route::has('login'))
            @auth
            <li class="nav-item">
              <a class="nav-link" style="background-color:greenyellow" href="{{url('myappointments')}}">My Appointments </a>
            </li>
            <x-app-layout>
            </x-app-layout>
            @else

            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{route('register')}}">Register</a>
            </li>
            @endauth
            @endif
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>
    <div class="container">

        <div style="width:30%;float:left;margin:15px 0;padding: 10px 15px;text-align: center;">
            <!---->
                <div style="cursor:pointer">
                  <summary id="select" value="Select Speciality" style="display:block;list-style:none" onclick="myFunction()">Select Speciality
                    <i style="transform: rotate(45deg);-webkit-transform: rotate(45deg);border: solid black;
                    border-width: 0 3px 3px 0;display: inline-block;padding: 3px;visibility:visible" id="down"></i>
                    <i style="transform: rotate(-135deg);-webkit-transform: rotate(-135deg);border: solid black;
                    border-width: 0 3px 3px 0;display: inline-block;padding: 3px;visibility:hidden" id="up"></i>
                  </summary>
                  
                  
                  
                </div>
                <ul name="doctor" style="list-style-type:none" class="hide" id="list_select">
          
                  @foreach($result as $doctor)
                  
                      
                        <li style="background-color: #00D9A5;color: white;font-size: larger;text-align: left;" class="test2">
                          <a href="{{route('doctor_speciality', $doctor->speciality)}}" style="text-decoration:none;width:100%;height:100%;display:block;padding: 3px;" id="test" class="test2">
                            {{$doctor->speciality}}
                          </a>
                        </li>
                      

                  @endforeach

               </ul>
        </div>

        <div style="width:70%;float:left;margin:15px 0;padding:10px 15px">
            @foreach($data as $doctor)
              <a href="{{route('doctor_details', $doctor->id)}}">
                <div style="float:left;margin:10px 15px;text-align:center">
                    <h5 for="">{{$doctor->name}}</h5>
                    <img src="doctorimages/{{$doctor->image}}" alt="">
                    <span style="display:block">{{$doctor->speciality}}</span>
                </div>
              </a>
            @endforeach
        </div>
    </div>
<script>
  function myFunction () {
    document.getElementById('list_select').classList.toggle("show");
    //document.getElementById('down').style.visibility="hidden";
    //document.getElementById('up').style.visibility="visible";
  }
</script>
<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>
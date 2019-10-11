<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="_token" content="{{csrf_token()}}" />
  <title>Best Online Deals</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="{{ asset ('vendors/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset ('vendors/fontawesome/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset ('vendors/themify-icons/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset ('vendors/nice-select/nice-select.css') }}">
  <link rel="stylesheet" href="{{ asset ('vendors/owl-carousel/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset ('vendors/owl-carousel/owl.carousel.min.css') }}">
  <script src="{{ asset ('vendors/jquery/jquery-3.2.1.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

    <style>
            .nav-link:hover {

              background-color: 	#E0FFFF;

            }
            a:active {
                background-color: yellow;
              }

    </style>
  <!--================ Start Header Menu Area =================-->
	<header class="header_area " style=" background-color:#B0C4DE;">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container" style=" color">
          <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li  class="nav-item "><a  style="color:black" class="nav-link" href="/">Home</a></li>
              <li class="nav-item "><a  style="color:black" class="nav-link" href="/all">All products</a></li>
              <li class="nav-item "><a style="color:black" class="nav-link" href="/popular">Popular Products</a></li>
              <li class="nav-item "><a style="color:black" class="nav-link" href="/cheapest">Cheapest Deals</a></li>
              <li class="nav-item"><a style="color:black" class="nav-link" href="/blog">Blog</a></li>
            </ul>

            <ul class="nav-shop">
              <li class="nav-item">
                  <div class="card-header">
                      <form method="POST" action='{{ url("/search") }}'>
                          {{ csrf_field() }}
                          <div class="input-group">
                              <input type="text" name="search" class="form-control" placeholder="Search for ...">
                              <span class="input-group-btn">
                                  <button type="submit" class="btn btn-default">
                                      Go!
                                  </button>
                              </span>
                          </div>
                      
                      </form>
                  </div></li>

            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
	<!--================ End Header Menu Area =================-->


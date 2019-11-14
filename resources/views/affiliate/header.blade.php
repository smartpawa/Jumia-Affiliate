<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="_token" content="{{csrf_token()}}" />
  <title>Best Online Deals</title>
    <link rel="icon" href="/img/logo.png" type="image/png">



  <link rel="stylesheet" href="{{ asset ('vendors/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset ('vendors/fontawesome/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset ('vendors/themify-icons/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset ('vendors/nice-select/nice-select.css') }}">
  <link rel="stylesheet" href="{{ asset ('vendors/owl-carousel/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset ('vendors/owl-carousel/owl.carousel.min.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fjalla+One">

</head>
<body style=" background-image:url('/img/background.jpg'),url('/img/background1.jpg')">

    <style>
.productname{
    font-size: 12px;
}

        .col-md-6{
            margin-bottom:2px;
        }
        .btn-outline-success {

 color: #28a745;

 background-color: transparent;

 background-image: none;

 border-radius: 35px;

 border: 1px solid rgba(40, 167, 69, 0.75);

}

        .btn:hover{
            background-color:lightseagreen;
        }
            .nav-link.nav-item a:hover {

              background-color:lightseagreen;


            }
            a:active {
                   background-color:lightseagreen;
              }
              .btn btn-success{
                height:3px
              }

    </style>
  <!--================ Start Header Menu Area =================-->
	<header class="header_area " style=" background-color:darkslategray;">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container" style=" color">
          <a class="navbar-brand logo_h" href="/"><img height="70px"src="/img/logo.png" alt=""></a>

          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li  class="nav-item "><a  style="color:white" class="nav-link" href="/">Home</a></li>
             <li class="nav-item "><a style="color:white"  class="nav-link" href="/all">All products</a></li>
              <li class="nav-item "><a style="color:white" class="nav-link" href="/popular">Popular Products</a></li>
              <li class="nav-item "><a style="color:white"  class="nav-link" href="/cheapest">Cheapest Deals</a></li>
              <li class="nav-item "><a style="color:white"  class="nav-link" href="/advancedsearch"><i class="fa fa-search"></i> Custom Search</a></li>

            </ul>
<style>
    .nav-item a:hover{
color:red;

    }
</style>
            <ul class="nav-shop">
              <li class="nav-item">
                  <div>


<form id="searchform" method="GET" action='{{ url("/search") }}'>
    {{ csrf_field() }}
    <div class="input-group md-form form-sm form-2 pl-0">
            <input class="form-control my-0 py-1 red-border" name="search" type="text" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <span class="input-group-text red lighten-3" onclick="search()" id="basic-text1"><i class="fas fa-search text-grey"
                  aria-hidden="true"></i></span>
            </div>
          </div>
</form>
<script>
function search(){

    document.getElementById("searchform").submit();


}
</script>

                  </div></li>

            </ul>
          </div>
        </div>
      </nav>
    </div>
<div class="row">
    <marquee behavior="scroll" direction="left" ><h6 style="color:white;font-family: Arial;"><i class=" fa fa-shopping-cart"></i> We keep you updated with best deals from the best online retailers in Kenya !</h6></marquee>
</div>
  </header>
  <div class="card-header" id="smallnavbar">
        <ul class="list-inline align-right">

                <a  style="color:white; margin:1px;"  href="/">  <span class="badge badge-pill badge-secondary">Home</span></a>
                <a style="color:white;margin:1px"  href="/all">  <span class="badge badge-pill badge-secondary">View all Products</span></a>
                <a style="color:white;margin:1px" href="/popular"> <span class="badge badge-pill badge-secondary">Popular Products</span></a>
                <a style="color:white;margin:1px"   href="/advancedsearch"> <spa class="badge badge-pill badge-secondary"><i class="fa fa-search"></i> Custom Search</spa></a>
              </ul>

  </div>

  <div class="card-header" id="search2" style="text-align:center">
        <ul class="nav-shop" style="text-align:center">
                <li class="nav-item" style="text-align:center">
                    <div>


  <form id="searchform" method="GET" action='{{ url("/search") }}'>
      {{ csrf_field() }}
      <div class="input-group md-form form-sm form-2 pl-0">
              <input class="form-control my-0 py-1 red-border" name="search" type="text" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <span class="input-group-text red lighten-3" onclick="search()" id="basic-text1"><i class="fas fa-search text-grey"
                    aria-hidden="true"></i></span>
              </div>
            </div>
  </form>
  <script>
  function search(){

      document.getElementById("searchform").submit();


  }
  </script>

                    </div></li>

              </ul>

  </div>


  <script>
        var w = screen.width;

        if(w < 1000){

            $("#navbarSupportedContent").hide();

        }
        if(w > 1000){

$("#smallnavbar").hide();
$("#search2").hide();

}






        </script>



  <div class=" card-header">
        <ul class="list-inline">
            <li>   <span class="badge badge-danger">POPULAR CATEGORIES: </span></li>
            @foreach($subcats as $subcat)
        <a style="margin:1px" href="/subcategories/{{ $subcat->subcategory_slug}}">
           <span class="badge badge-success">{{  ucwords($subcat->subcategory_name)}}</span></a>
@endforeach

<li style="margin-top:5px">   <span class="badge badge-danger">POPULAR BRANDS: </span></li>
@foreach($brands as $brand)
<a style="margin:1px" href="/brands/{{ $brand->brand_slug}}">
<span class="badge badge-warning">{{  ucwords($brand->brand_name)}}</span></a>
@endforeach
  </div>
	<!--================ End Header Menu Area =================-->

    <script>
        window.location.href='#productsstart';
    </script>

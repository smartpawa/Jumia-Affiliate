@include('affiliate.header')
<!--========= End Header Menu Area =================-->

  <main class="site-main">

    <!--================ Hero banner start =================-->
    <section class="hero-banner">
      <div class="container">
        <div class="row no-gutters align-items-center pt-60px">
          <div class="col-5 d-none d-sm-block">
            <div class="hero-banner__img">
              <img class="img-fluid" src="img/image1.jpg" alt="">
            </div>
          </div>
          <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
            <div class="hero-banner__content">
              <h4>Shop is fun</h4>
              <h1>Browse Our Premium Product</h1>
              <p>Us which over of signs divide dominion deep fill bring theyre meat beho upon own earth without morning over third. Their male dry. They are great appear whose land fly grass.</p>
              <a class="button button-hero" href="#">Browse Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ Hero banner start =================-->

    <!--================ Hero Carousel start =================-->



    <!--================ Hero Carousel end =================-->

    <!-- ================ trending product section start ================= -->
    <section class="section-margin calc-60px">
      <div class="container">
        <div class="section-intro pb-60px" style=" text-align:center">
          <p>Popular products in the market</p>
          <h2>Trending <span class="section-intro__style"> Products</span></h2>
        </div>
        <div class="row">
                <style>
                        #products:hover {
                            outline: 1px solid black;

                        }
                </style>
                @include('affiliate.sidemenu')
                    <div class="col-xl-9 col-lg-8 col-md-7">

                          <!-- Start Best Seller -->
                          <section class="lattest-product-area pb-40 category-list">

                            <div class="row">

                @foreach($trendingProducts as $product)
                              <div id="products" class="col-md-6 col-lg-3" id="{{ $product->id }}">
                                <div class="card text-center card-product">
                                  <div class="card-product__img"><a href="{{ $product->affiliate_url }}">
                                    <img class="card-img" src="{{ $product->product_image_url }}" alt="">

                                  </a>

                                    <ul class="card-product__imgOverlay">
                                      <a href="{{ $product->affiliate_url }}"><button class="btn btn-primary">Visit Seller</button></a>
                                    </ul>
                                  </div>
                                  <div class="card-body" style=" font-size: 13px">
                                        <p>Seller: {{ $product->seller }}</p>
                                    <p  class=""><a  style="color:black;font-size: 15px" href="{{ $product->affiliate_url }}">{{ $product->product_name }}</a></p>
                                    <p style="color:red" ><strike>Kshs {{ number_format($product->former_price) }}</strike> (-{{ ceil(((($product->former_price)-($product->current_price))/($product->former_price))*100)}}%) </p>
                                    <p style="color:green" >Kshs {{ number_format($product->current_price) }}</p>
                                  </div>
                                </div>
                              </div>


                              <script>
                                jQuery(document).ready(function(){
                                   jQuery('#{{ $product->id }}').click(function(e){

                                      $.ajaxSetup({
                                         headers: {
                                             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                         }
                                     });
                                      jQuery.ajax({
                                         url: "{{ url('/addvisitcount') }}",
                                         method: 'post',
                                         data: {
                                            id: {{ $product->id }}

                                         },
                                         success: function(result){

                                         }});
                                      });
                                   });
                             </script>


                @endforeach

                            </div>
<div class=" text-center">
    <br><br>
    <a href="/popular"> <button style="width:200px" class=" btn btn-primary"> See More </button></a>

   </div>
                          </section>
                          <!-- End Best Seller -->
                        </div>
                      </div>
      </div>
    </section>
    <!-- ================ trending product section end ================= -->


    <!-- ================ offer section start ================= -->
    <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
      <div class="container">
        <div class="row">
          <div class="col-xl-5">
            <div class="offer__content text-center">
              <h3>Up To 50% Off</h3>
              <h4>Winter Sale</h4>
              <p>Him she'd let them sixth saw light</p>
              <a class="button button--active mt-3 mt-xl-4" href="#">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ offer section end ================= -->


    <!-- ================ Blog section start ================= -->
    <section class="blog">
      <div class="container">
        <div class="section-intro pb-60px">
          <p>Popular Item in the market</p>
          <h2>Latest <span class="section-intro__style">News</span></h2>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card card-blog">
              <div class="card-blog__img">
                <img class="card-img rounded-0" src="img/blog/blog1.png" alt="">
              </div>
              <div class="card-body">
                <ul class="card-blog__info">
                  <li><a href="#">By Admin</a></li>
                  <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                </ul>
                <h4 class="card-blog__title"><a href="single-blog.html">The Richland Center Shooping News and weekly shooper</a></h4>
                <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
                <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card card-blog">
              <div class="card-blog__img">
                <img class="card-img rounded-0" src="img/blog/blog2.png" alt="">
              </div>
              <div class="card-body">
                <ul class="card-blog__info">
                  <li><a href="#">By Admin</a></li>
                  <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                </ul>
                <h4 class="card-blog__title"><a href="single-blog.html">The Shopping News also offers top-quality printing services</a></h4>
                <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
                <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card card-blog">
              <div class="card-blog__img">
                <img class="card-img rounded-0" src="img/blog/blog3.png" alt="">
              </div>
              <div class="card-body">
                <ul class="card-blog__info">
                  <li><a href="#">By Admin</a></li>
                  <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                </ul>
                <h4 class="card-blog__title"><a href="single-blog.html">Professional design staff and efficient equipment you’ll find we offer</a></h4>
                <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
                <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ Blog section end ================= -->




  </main>


  <!--================ Start footer Area  =================-->
@include('affiliate.footer')

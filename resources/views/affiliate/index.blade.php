@include('affiliate.header')
<!--========= End Header Menu Area =================-->

  <main class="site-main">

    <!--================ Hero banner start =================-->
    <section>
        <div class="col-md-4">
            <div class="card">
                    <div class="card card-header">
                      What's our site about?
                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        <p>You no longer have to go through the entire internet looking for a smartphone,a laptop,a dress that you really want for your daughter's birthday or even some nice earphones that a colleague at work reccomended.We have it all pooled together for you!</p>
                        <footer  class="blink_me blockquote-footer" style="color:red">Disclaimer: We are not sales agents or representatives of any of these sellers.We only link you to their products.Enjoy shopping.
                        </footer>
                      </blockquote>
                    </div>
                  </div></div>
    </section>
    <style>
            .blink_me {
                animation: blinker 6s linear infinite;
              }

              @keyframes blinker {
                50% {
                  opacity: 0;
                }
              }
    </style>
    <!--================ Hero banner start =================-->

    <!--================ Hero Carousel start =================-->



    <!--================ Hero Carousel end =================-->

    <!-- ================ trending product section start ================= -->
    <section class="section-margin calc-60px">
      <div class="container">
        <div class="section-intro pb-60px" style=" text-align:center">
          <p style="color:white">Popular products in the market</p>
          <h2 style="color:white"> <span class="section-intro__style">Trending Products</span></h2>
        </div>
        <div class="row">
                <style>
                        #products:hover {
                            outline: 1px solid black;

                        }
                </style>
                @include('affiliate.sidemenu')

                    <div class="col-xl-9 col-lg-9 col-md-7">

                          <!-- Start Best Seller -->
                          <section class="lattest-product-area pb-40 category-list">

                            <div class="row">

                                    @foreach($trendingProducts as $product)
                                    <div class="col-md-6 col-lg-3" id="{{ $product->id }}">
                                      <div class="card text-center card-product">
                                        <div class="card-product__img"><a href="{{ $product->affiliate_url }}">
                                          <img style="" class="card-img" src="{{ $product->product_image_url }}" alt="">

                                        </a>


                                        </div>
                                        <div class="card-body" style=" font-size: 13px">
                                              <p>Seller: {{ $product->seller }}</p>
                                          <p  class=""><a  style="color:black;font-size: 15px" href="{{ $product->affiliate_url }}">{{ $product->product_name }}</a></p>
                                          <p style="color:red" ><strike>Kshs {{ number_format($product->former_price) }}</strike> (-{{ ceil(((($product->former_price)-($product->current_price))/($product->former_price))*100)}}%) </p>
                                          <p style="color:green;font-size:16px" >Kshs {{ number_format($product->current_price) }}</p>
                                        </div>
                                        <div>
                                              <a href="{{ $product->affiliate_url }}">   <button style="margin-bottom:15px" type="button" class="btn btn-success">Visit Seller</button></a>
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








  </main>


  <!--================ Start footer Area  =================-->
@include('affiliate.footer')

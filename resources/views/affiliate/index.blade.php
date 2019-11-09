@include('affiliate.header')
<!--========= End Header Menu Area =================-->
<style>
    .col-4 .card-body{
        background-color: wheat
    }
</style>
  <main class="site-main">

    <!--================ Hero banner start =================-->
    <section>
        <div class="row" class="text-center">
                <div class="col-md-4 col-lg-4 col-sm-12 offset-md-2 offset-lg-2" style="height:600px">
                <div class="card">
                        <div class="card card-header text-center">
                          What is our site about?
                        </div>
                        <div class="card-body">
                          <blockquote class="blockquote mb-0">
                            <p class="text-center " style="color: black">You no longer have to trek across the entire internet looking for products from E-Commerce stores.We have it all pooled together for you.We bring you the best offers from the best eccomerce platfroms in Kenya</p>
                            <footer  class="blink_me blockquote-footer" style="color:red">Disclaimer: We are not sales agents or representatives of any of these sellers.We only link you to their products.Enjoy shopping.
                            </footer>
                            <br>
                            <footer style="text-align: center">
                                    <a href="/all" class="btn btn-success sm">Start Shopping!</a>
                     
                                </footer>
                          </blockquote>
                        </div>
                      </div>
                    </div>
                   <div class="col-lg-4 col-md-4 col-sm-12" style="height:600px">
                            <div class="card">
                                    <div class="card card-header text-center">
                                      Our best feature;a customized search!
                                    </div>
                                    <div class="card-body">
                                      <blockquote class="blockquote mb-0">
                                        <p style="color: black" class="text-center">
We give you the chance to get you products that fit within your budget.Say you want a phone worth Kshs 15,000
We will give you all the available phones within that price range.You can even customize your search to a specific phone model.This applies for all products.
                                        </p>
                                        <br>
                                        <footer style="text-align: center">
                                            <a href="/advancedsearch" class="btn btn-success sm">Try it out!</a>
                             
                                        </footer>
                                      

                                      </blockquote>
                                    </div>
                                  </div>
                                </div>
                            
        </div>
      
            



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

  <script>
    if(screen.width<800){

        $('.card-img').attr('style','height: 80px');
        $('.card-img').attr('style','width: 80px');

        $('.productname').attr('style','font-size:5px');
    }


    </script>

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

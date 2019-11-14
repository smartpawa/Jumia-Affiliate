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
         <style>
                .sticker body {
                    font-family: "Fjalla One", sans-serif;
                    color: white;
                    background: url("http://subtlepatterns.subtlepatterns.netdna-cdn.com/patterns/blackorchid.png");
                  }
                  .sticker {
                    margin: 70px auto;
                    width: 580px;
                  }
                  .sticker h1 {
                    text-align: center;
                    font-size: 2em;
                    margin-bottom: 1em;
                  }
                  aside.sticker {
                    margin: 20px;
                    font-size: 20px;
                    text-shadow: 0px 0px 3px rgba(0,0,0,0.4);
                    color: black;
                    width: 250px;
                    height: 250px;
                    display: inline-block;
                    border-radius: 100%;
                    background: -webkit-linear-gradient(135deg, transparent 32px, #aaa 20px, #eee);
                    text-align: center;
                    padding-top: 40px;
                    box-sizing: border-box;
                    overflow: hidden;
                  }


                  aside.sticker.green {
                    color: white;
                    background: -webkit-linear-gradient(135deg, transparent 32px, #46a82d 20px, #70c757);
                  }
                  aside.sticker.cyan {
                    color: white;
                    background: -webkit-linear-gradient(135deg, transparent 32px, #2d8aa6 20px, #57b1c7);
                  }
                  aside.sticker.yellow {
                    color: white;
                    background: -webkit-linear-gradient(135deg, transparent 32px, #a69c2e 20px, #c7b857);
                  }
                  aside.sticker.pink {
                    color: white;
                    background: -webkit-linear-gradient(135deg, transparent 32px, #8e2ea6 20px, #b457c7);
                  }
         </style>
         <style>
                .blink-bg{
                    color: #fff;
                    padding: 10px;
                    display: inline-block;
                    border-radius: 5px;
                    animation: blinkingBackground 2s infinite;
                }
                @keyframes blinkingBackground{
                    0%		{ background-color: #10c018;}
                    25%		{ background-color: #1056c0;}
                    50%		{ background-color: #ef0a1a;}
                    75%		{ background-color: #254878;}
                    100%	        { background-color: #04a1d5;}
                }
            </style>
            <div class="stickers offset-lg-4 offset-sm-1">

                  <aside style="margin:50px" class="sticker green">Try this out!</br>Our amazing</br>Customized search </br></br>
                        <a href="/advancedsearch"> <button style="border-radius:50px" class=" btn btn-default small blink-bg"> Try it out! </button></a>

                    </aside>
                    <aside style="margin:50px"   class="sticker yellow">Disclaimer:</br>We are not</br>agents</br>
                        of any of these</br>stores;</br>We only market.
                        </aside>
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
                                          <p  class="productname"><a  style="color:black;" href="{{ $product->affiliate_url }}">{{ $product->product_name }}</a></p>
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

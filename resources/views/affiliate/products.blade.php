<style>
    .col-md-6:hover {
        outline: 1px solid black;
opacity: 1;
    }

</style>



@include('affiliate.header')

  <section class="section-margin--small mb-5" style=" opacity: 0.9;">
    <div class="container">

      <div class="row" >


@include('affiliate.sidemenu')


    <div class=" col-xl-9 col-lg-9 col-md-7" id="productsstart">
            <div class="card">
            <div class="card-header text-center">

                    All Products
                  </div>
        <div class="card-body">

          <!-- Start Best Seller -->
          <section class="lattest-product-area pb-40 category-list">

                <div>
                        <ul class="pagination justify-content-center" style="margin:20px 0">
                                <li class="page-item">{{ $products->links() }}</li>
                              </ul>



                </div>
            <div class="row">
<style>
        .col-md-6:hover {
            outline: 1px solid black;

        }
</style>
    @foreach($products as $product)
              <div  class="col-md-3 col-lg-3 col-sm-2" id="{{ $product->id }}">
                <div class="card text-center card-product">
                  <div class="card-product__img"><a href="{{ $product->affiliate_url }}">
                    <img class="card-img" src="{{ $product->product_image_url }}" alt="">

                  </a>


                  </div>
                  <div class="card-body" style=" font-size: 13px">
                        <p>Seller: {{ $product->seller }}</p>
                    <p  class="productname"><a  style="color:black;" href="{{ $product->affiliate_url }}">{{ $product->product_name }}</a></p>
                    <p style="color:red" ><strike>Kshs {{ number_format($product->former_price) }}</strike> (-{{ ceil(((($product->former_price)-($product->current_price))/($product->former_price))*100)}}%) </p>
                    <p c style="color:green;font-size:16px" >Kshs {{ number_format($product->current_price) }}</p>
                  </div>
                  <div>
                        <a href="{{ $product->affiliate_url }}">   <button type="button" class="btn btn-success btn-sm">View Details</button></a>
                  </div>
                </div>
              </div>


              <script>

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
                
             </script>

            </br>

@endforeach

<script>
    if(screen.width<800){

        $('.card-img').attr('style','height: 140px');
        $('.card-img').attr('style','width: 100px');


    }


    </script>

            </div>
            <div>
                    <ul class="pagination justify-content-center" style="margin:20px 0">
                            <li class="page-item">{{ $products->links() }}</li>
                          </ul>



            </div>
          </section>
          <!-- End Best Seller -->
        </div>
      </div></div></div>
    </div>
  </section>



@include('affiliate.footer')

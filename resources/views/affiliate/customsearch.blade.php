<style>
        .col-md-6:hover {
            outline: 1px solid black;

        }

    </style>
<script>
    window.location.href='#results';
</script>
@if($products->isEmpty())
    <script>
    alert("We could not find any items matching your parameters.We are however working on it.Check later or try another search!");
    history.back();
    </script>


    @endif

    @include('affiliate.header')


      <section class="section-margin--small mb-5" style=" opacity: 0.9;">
        <div class="container">
          <div class="row">
                

    @include('affiliate.sidemenu')


        <div class=" col-xl-9 col-lg-9 col-md-7" id="productsstart">
                <div class="card">
                <div class="card-header text-center">
<h4>Customized Search Results</h4>
          </div>

      <div class="card-body" id="results">

        <!-- Start Best Seller -->
        <section class="lattest-product-area pb-40 category-list">
              <div class="input-group">


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
      <div class="col-md-6 col-lg-3" id="{{ $product->id }}">
        <div class="card text-center card-product">
          <div class="card-product__img"><a href="{{ $product->affiliate_url }}">
            <img class="card-img" src="{{ $product->product_image_url }}" alt="">

          </a>


          </div>
          <div class="card-body" style=" font-size: 13px">
                <p>Seller: {{ $product->seller }}</p>
            <p  class=""><a  style="color:black;font-size: 15px" href="{{ $product->affiliate_url }}">{{ $product->product_name }}</a></p>
            <p style="color:red" ><strike>Kshs {{ number_format($product->former_price) }}</strike> (-{{ ceil(((($product->former_price)-($product->current_price))/($product->former_price))*100)}}%) </p>
            <p style="color:green;font-size:16px" >Kshs {{ number_format($product->current_price) }}</p>
          </div>
          <div>
                <a href="{{ $product->affiliate_url }}">   <button type="button" class="btn btn-success">Visit Seller</button></a>
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

@if($products->isEmpty())
<script>
alert("We currently have no items in this sub category.We are however working on it.Check later!");
history.back();
</script>

<script>
        window.location.href='#productsstart';
    </script>
@endif


<style>
        .col-md-6:hover {
            outline: 1px solid black;

        }

    </style>
    @include('affiliate.header')

      <section class="section-margin--small mb-5" style=" opacity: 0.9;">
        <div class="container">
          <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-5">
                        <div class="sidebar-categories" >
                                <div class="head" id="sub">BRANDS <i class="fa fa-angle-double-down"></i></div>
                                <ul class="list-group" id="subcategories" >

                                        @foreach ($brand as $brand )

                                    <a   href="/brands/{{ $brand->brand_slug }}"><li class="category-link list-group-item" style="font-size:12px">{{ $brand->brand_name }}</li></a>
                                       @endforeach



                                    </ul>
                              </div>

                              <style>
                                    .category-link:hover {
                                        background-color: #85C1E9 ;

                                    }

                            </style>



                                <div class="sidebar-categories" >
                                  <div class="head" id="main">OTHER CATEGORIES <i class="fa fa-angle-double-down"></i></div>
                                  <ul class="list-group" id="maincategories">

                                        @foreach ($categories as $category )

                                      <a style="color:black"   href="/products/{{ $category->category_slug }}"><li class="category-link list-group-item" style="font-size:12px">{{ $category->category_name }} ({{  $categoryCount[$index] }})</li></a>
                                      @php
                                          $index=$index+1;
                                      @endphp
                                      @endforeach



                                      </ul>
                                </div>



                  </div>
        <script>
        var w = screen.width;

        if(w < 726){
        $("#maincategories").hide();
            $("#subcategories").hide();

            //TOGGLE SUB CATEGORIES
            $("#sub").click(function(){
          $("#subcategories").toggle(10);
        });

        //TOGGLE MAIN CATEGORIES
          $("#main").click(function(){
          $("#maincategories").toggle(10);
        });
        }





        </script>


        <div class=" col-xl-9 col-lg-9 col-md-7" id="productsstart">
                <div class="card">
                <div class="card-header text-center">

                        {{ ucwords($name)}} ({{$items}} Products)
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
       <div class="col-md-6 col-lg-3" id="{{ $product->id }}">
         <div class="card text-center card-product">
           <div class="card-product__img"><a href="{{ $product->affiliate_url }}">
             <img class="card-img" src="{{ $product->product_image_url }}" alt="">

           </a>


           </div>
           <div class="card-body" style=" font-size: 13px">
                 <p>Seller: {{ $product->seller }}</p>
             <p  class="productname"><a  style="color:black;" href="{{ $product->affiliate_url }}">{{ $product->product_name }}</a></p>
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

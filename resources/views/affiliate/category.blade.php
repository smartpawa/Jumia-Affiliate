@include('affiliate.header')

	<!--================ End Header Menu Area =================-->



	<!-- ================ category section start ================= -->
  <section class="section-margin--small mb-5">
    <div class="container">

      <div class="row">



        <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                        <div class="head">Sub Categories</div>
                        <ul class="list-group">

                                @foreach ($subcategories as $subcategory )

                            <a   href="/subcategories/{{ $subcategory->subcategory_slug }}"><li class="category-link list-group-item">{{ $subcategory->subcategory_name }}</li></a>
                               @endforeach



                            </ul>
                      </div>

                      <style>
                            .category-link:hover {
                                background-color: #85C1E9 ;

                            }

                    </style>



                        <div class="sidebar-categories">
                          <div class="head">Other Categories</div>
                          <ul class="list-group">

                                @foreach ($categories as $category )

                              <a style="color:black"   href="/products/{{ $category->category_slug }}"><li class="category-link list-group-item">{{ $category->category_name }} ({{  $categoryCount[$index] }})</li></a>
                              @php
                                  $index=$index+1;
                              @endphp
                              @endforeach



                              </ul>
                        </div>



          </div>



    <div class="col-xl-9 col-lg-8 col-md-7">
            <div   class=" text-center panel panel-heading "><h6><u>{{ $name }} </u>({{ $items }} )</h6></div>

          <section class="lattest-product-area pb-40 category-list">
                <div>
                        <ul class="pagination justify-content-center" style="margin:20px 0">
                                <li class="page-item">{{ $products->links() }}</li>
                              </ul>



                </div>
            <div class="row">
@foreach($products as $product)
              <div class="col-md-6 col-lg-3" id="{{ $product->id }}">
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
            <div>
                    <ul class="pagination justify-content-center" style="margin:20px 0">
                            <li class="page-item">{{ $products->links() }}</li>
                          </ul>



            </div>
          </section>
          <!-- End Best Seller -->
        </div>
      </div>
    </div>
  </section>
	<!-- ================ category section end ================= -->


@include('affiliate.footer')

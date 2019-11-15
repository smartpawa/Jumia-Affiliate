@include('affiliate.header')

	<!--================ End Header Menu Area =================-->

    @if($products->isEmpty())
    <script>
    alert("We currently have no items in this Category.We are however working on it.Check later!");
    history.back();
    </script>


    @endif
    <script>
        window.location.href='#productsstart';
    </script>
	<!-- ================ category section start ================= -->
  <section class="section-margin--small mb-5" style=" opacity: 0.9;">
    <div class="container">

      <div class="row">



        <div class="col-xl-3 col-lg-4 col-md-5">


                      <style>
                            .category-link:hover {
                                background-color: #85C1E9 ;

                            }

                    </style>



                        <div class="sidebar-categories" >
                          <div class="head" id="main">Categories <i class=" fa fa-angle-double-down"></i></div>
                          <ul class="list-group" id="maincategories">

                                @foreach ($categories as $category )

                              <a style="color:black"   href="/products/{{ $category->category_slug }}"><li class="category-link list-group-item">{{ $category->category_name }} ({{  $categoryCount[$index] }})</li></a>
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


    //TOGGLE SUB CATEGORIES
    $("#sub").click(function(){

});

//TOGGLE MAIN CATEGORIES
  $("#main").click(function(){
  $("#maincategories").toggle(500);
});
}





</script>



          <div class=" col-xl-9 col-lg-9 col-md-7" id="productsstart">
            <div class="card">
            <div class="card-header text-center alert alert-info">

            {{ $name }} Products
               </div>
        <div class="card-body">

          <!-- Start Best Seller -->
          <section class="lattest-product-area pb-40 category-list">
              <div> <label>Sort by: </label>
                <form method="POST">
                      <label class="radio-inline"><input checked  class="filter" type="radio" value="0" name="optradio">Default </label>

                <label class="radio-inline"><input class="filter" type="radio" value="1" name="optradio">Most Popular</label>

{{csrf_field()}}
                    <label class="radio-inline"><input class="filter" value="2" type="radio" name="optradio" >Cheapest Price </label>
                    <label class="radio-inline"><input class="filter" type="radio" value="3" name="optradio">Highest price</label>
</form>

              </div>


















             <div>
                        <ul class="pagination justify-content-center" style="margin:20px 0">
                                <li class="page-item">{{ $products->links() }}</li>
                              </ul>



                </div>
            <div class="row" id="listproducts" >
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


 
            </div>
            <div>
                    <ul class="pagination justify-content-center" style="margin:20px 0">
                            <li class="page-item">{{ $products->links() }}</li>
                          </ul>



            </div>
            </div>
          </section>
          <!-- End Best Seller -->
        </div>
      </div></div>
    </div>
    </div>
  </section>
	<!-- ================ category section end ================= -->


@include('affiliate.footer')


  <script>
                jQuery(document).ready(function(){
                   jQuery('.filter').click(function(e){

                      $.ajaxSetup({
                         headers: {
                             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                         }
                     });
                      jQuery.ajax({
                         url: "/filter",
                         method: 'get',
                         data: {
                            id: {{ $cat_id }},
                            parameter:this.value

                         },
                         success: function(result){
$('#listproducts').html(result);
                         },
                         error:function(error){
                             console.log(error);
                         }



                        });
                      });
                   });
             </script>

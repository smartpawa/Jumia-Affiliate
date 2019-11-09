
@include('affiliate.header')

<style>
    .input-group-text{
        font-size: 12px;
    }
</style>
<div class="container" style="margin:50px 0px 50px 0px" id="searchform">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8 offset 2">
            <div class="card" id="customsearchform">
                <div class="card-header">{{ __('Custom Product Search') }}</div>
<div class="card-body" id="">
        <p>Our awesome custom search aims at giving you exactly what you want.Select the options from up,downwards.
                What you select determines the options you will be provided in the subsequent selection.Enjoy shopping!
        </p>
</div>
                <div class="card-body">
                  <form style="font-size:8px" class="form-inline" id="customsearch" method="POST" action="{{ route('customsearch.store') }}">

                        {{ csrf_field() }}
        <label class="sr-only" for="inlineFormInputName2">Category</label>

        <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Category </div>
                </div>
                <select type="text" class="form-control" id="categories" name="category" >
                    <option value="0" class="form-control">Categories</option>
                    @foreach ($categories as $category )
<option class="form-control" value="{{$category->id}}">{{ ucfirst($category->category_name) }}</option>
                    @endforeach
                </select>
              </div>

              <label class="sr-only" for="inlineFormInputName2">Category</label>

              <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text" >Sub-Category </div>
                      </div>
                      <div id="subcats">
                            <select class="form-control search-slt" name="subcategory">
                                    <option value="0">All Sub-Categories</option>

                                </select>

                      </div>

                    </div>


                    <label class="sr-only" for="inlineFormInputName2">Category</label>

        <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Brand  </div>
                </div>
               <div class="" id="brands">
                    <select class="form-control search-slt" name="brand">
                            <option value="0" >All Brands</option>

                        </select>               </div>
              </div>

              <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Min Price(Kshs) </div>
                    </div>
                    <div class="form-group">
                            <select class="form-control" name="minprice">
                                <option value="0">Select</option>
                                    <option>0</option>
                              <option>500</option>
                              <option>1,000</option>
                              <option>5,000</option>
                              <option>8,000</option>
                              <option>10,000</option>
                              <option>13,000</option>
                              <option>15,000</option>
                              <option>20,000</option>
                              <option>25,000</option>
                              <option>30,000</option>
                              <option>35,000</option>
                              <option>40,000</option>
                              <option>50,000</option>
                              <option>60,000</option>
                              <option>65,000</option>
                              <option>70,000</option>
                              <option>80,000</option>
                              <option>90,000</option>
                              <option>100,000</option>
                              <option>150,000</option>
                              <option>200,000</option>
                              <option>500,000</option>
                            </select>
                          </div> 
                  </div>
                  <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Max Price(Kshs) </div>
                        </div>
                        <div class="form-group">
                                <select class="form-control" name="maxprice">
                                        <option value="0">Select</option>
                                        <option>0</option>
                                  <option>500</option>
                                  <option>1,000</option>
                                  <option>5,000</option>
                                  <option>8,000</option>
                                  <option>10,000</option>
                                  <option>13,000</option>
                                  <option>15,000</option>
                                  <option>20,000</option>
                                  <option>25,000</option>
                                  <option>30,000</option>
                                  <option>35,000</option>
                                  <option>40,000</option>
                                  <option>50,000</option>
                                  <option>60,000</option>
                                  <option>65,000</option>
                                  <option>70,000</option>
                                  <option>80,000</option>
                                  <option>90,000</option>
                                  <option>100,000</option>
                                  <option>150,000</option>
                                  <option>200,000</option>
                                  <option>500,000</option>
                                </select>
                              </div> 
                      </div>
<div class="text-center">
        <button  style="text-align:center" type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i> Search Products</button>
   
</div>
   <br>
     
    </form>
<div>
    <button class="btn btn-primary" onclick="reset()">Reset Values</button>
    <script>
        function reset(){
            location.reload();
        }
    </script>
</div>
      <script>
            window.location.href='#customsearchform';

</script>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

                        <script>
                                jQuery(document).ready(function(){
                                   jQuery('#categories').change(function(e){

                                      $.ajaxSetup({
                                         headers: {
                                             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                         }
                                     });
                                      jQuery.ajax({
                                         url: "/getsubcats",
                                         method: 'get',
                                         data: {
category: $("#categories").val()
                                         },
                                         success: function(result){
                $('#subcats').html(result);
                                         },
                                         error:function(error){
                                             console.log(error);
                                         }



                                        });
                                      });
                                   });
                             </script>





@include('affiliate.footer')


@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Custom Product Search') }}</div>

                <div class="card-body">
                  <form class="form-inline" id="customsearch" method="POST" action="{{ route('customs.store') }}">
                      {{ csrf_field() }}
        <label class="sr-only" for="inlineFormInputName2">Category</label>

        <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Category </div>
                </div>
                <select type="text" class="form-control" id="categories" >
                    <option class="form-control">Categories</option>
                    @foreach ($categories as $category )
<option class="form-control">{{ $category->category_name }}</option>
                    @endforeach
                </select>
              </div>

              <label class="sr-only" for="inlineFormInputName2">Category</label>

              <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Sub Category </div>
                      </div>
                      <div id="subcats">
                            <select class="form-control search-slt">
                                    <option>Sub-Category</option>

                                </select>

                      </div>

                    </div>


                    <label class="sr-only" for="inlineFormInputName2">Category</label>

        <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Brand  </div>
                </div>
               <div class="" id="brands">
                    <select class="form-control search-slt">
                            <option>Brand</option>

                        </select>               </div>
              </div>

              <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Min Price(Kshs) </div>
                    </div>
                    <select type="text" class="form-control"  >


    <option class="form-control">0<option>
            <option class="form-control">500<option>
                    <option class="form-control">1,000<option>
                            <option class="form-control">3,000<option>
                                    <option class="form-control">5,000<option>
                                            <option class="form-control">8,000<option>
                                                    <option class="form-control">12,000<option>
                                                            <option class="form-control">15,000<option>
                                                                    <option class="form-control">20,000<option>
                                                                            <option class="form-control">30,000<option>
                    </select>
                  </div>
                  <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Max Price(Kshs) </div>
                        </div>
                        <select type="text" class="form-control"  >
                                <option class="form-control">1000<option>
                                        <option class="form-control">5,000<option>
                                                <option class="form-control">10,000<option>
                                                        <option class="form-control">15,000<option>
                                                                <option class="form-control">20,000<option>
                                                                        <option class="form-control">30,000<option>
                                                                                <option class="form-control">40,000<option>
                                                                                        <option class="form-control">50,000<option>
                                                                                                <option class="form-control">100,000<option>
                                                                                                        <option class="form-control">200,000<option>
                                                </select>
                      </div>

        <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i>Search Products</button>
      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



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






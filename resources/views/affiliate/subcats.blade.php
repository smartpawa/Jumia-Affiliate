<select type="text" class="form-control" id="subcat" name="subcat">
  <option value="0">Select Sub-Category</option>
    @foreach($subcategories as $sub)
<option value="{{$sub->id}}">{{  ucfirst($sub->subcategory_name)}}</option>

@endforeach
</select>

    <script>
            jQuery(document).ready(function(){
               jQuery('#subcat').change(function(e){

                  $.ajaxSetup({
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                     }
                 });
                  jQuery.ajax({
                     url: "/getbrands",
                     method: 'get',
                     data: {
brand: $('#subcat').val()
                     },
                     success: function(result){
$('#brands').html(result);
                     },
                     error:function(error){
                         console.log(error);
                     }



                    });
                  });
               });
         </script>

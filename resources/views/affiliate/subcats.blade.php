<select type="text" class="form-control" id="subcat">
<option>Sub 1</option>
<option>Sub 1</option>
<option>Sub 1</option>

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

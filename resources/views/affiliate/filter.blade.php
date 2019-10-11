<div class="input-group">

<div class="input-group-btn search-panel" class=" alert alert-success">


        <select name="cars" id="sort">
        <option> Sort by </option>
                <option value="1">Filter by </option>
                <option value="2">Most Popular</option>
                <option value="3">Lowest Price</option>
                <option value="4">Highest Price</option>

              </select>
</div>

</div>
<script>
        jQuery(document).ready(function(){

            jQuery("#sort").change(function (){
              $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                 }
             });
              jQuery.ajax({
                 url: "{{ url('/filter') }}",
                 method: 'post',
                 data: {
                    id: {{ $cat_id }},
                    parameter: $("#sort").val()

                 },
                 success: function(result){

$("#productsection").load('/filter');
                 }});
              });
           });
     </script>

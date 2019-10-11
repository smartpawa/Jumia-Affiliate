<div class="input-group">

<div class="input-group-btn search-panel">
        <select name="cars">
                <option value="audi">Sort by: </option>
                <option value="volvo">Most Popular</option>
                <option value="saab">Lowest Price</option>
                <option value="fiat">Highest Price</option>

              </select>
</div>

</div>
<script>
        jQuery(document).ready(function(){

            jQuery(".selectChange").change(function (){
              $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                 }
             });
              jQuery.ajax({
                 url: "{{ url('/addvisitcount') }}",
                 method: 'post',
                 data: {


                 },
                 success: function(result){

                 }});
              });
           });
     </script>

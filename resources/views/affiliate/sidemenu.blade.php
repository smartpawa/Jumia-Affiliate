

<style>
        .category-link:hover {
            background-color:lightseagreen;

        }

</style>



    <div class="sidebar-categories">
      <div id="browsecategories" class="head">Browse Categories</div>
      <ul id="categorylist" class="list-group">

            @foreach ($categories as $category )

          <a style="color:black"   href="/products/{{ $category->category_slug }}"><li class="category-link list-group-item">{{ $category->category_name }} ({{  $categoryCount[$index] }})</li></a>
          @php
              $index=$index+1;
          @endphp
          @endforeach



          </ul>
    </div>
<script>
         $(document).ready(function() {
    var screenwidth=screen.width;
    if(screenwidth<700){
        $('#categorylist').hide();
    }


    $('#browsecategories').
         });
</script>


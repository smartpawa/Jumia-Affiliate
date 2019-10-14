

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
var w = screen.width;

if(w < 726){
    $("#browsecategories").text("View Categories");
    $("#categorylist").hide();
    $("#browsecategories").click(function(){
  $("#categorylist").toggle(500);
});
}





</script>


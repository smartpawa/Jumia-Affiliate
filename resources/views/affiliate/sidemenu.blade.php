

<style>
        .category-link:hover {
            background-color:lightseagreen;

        }

</style>



    <div style="margin-bottom:5px" class="sidebar-categories col-sm-12 col-md-3 col-lg-3">
      <div id="browsecategories" class="head">Browse Categories  <i class=" fa fa-angle-double-down"> </i></div>
      <ul id="categorylist" class="list-group">

            @foreach ($categories as $category )

          <a style="color:black"   href="/products/{{ $category->category_slug }}"><li class="category-link list-group-item" style="font-size:12px">{{ $category->category_name }} ({{  $categoryCount[$index] }})</li></a>
          @php
              $index=$index+1;
          @endphp
          @endforeach



          </ul>
    </div>
    <script>
            var w = screen.width;

            if(w < 726){
            $("#maincategories").hide();
                $("#categorylist").hide();



            //TOGGLE MAIN CATEGORIES
              $("#browsecategories").click(function(){
              $("#categorylist").toggle();
            });
            }





            </script>


<div class="col-xl-3 col-lg-4 col-md-5">
    <div class="sidebar-categories">
      <div class="head">Browse Categories</div>
      <ul class="main-categories">
        <li class="common-filter">
          <form action="#">
            <ul>
                @foreach ($categories as $category )

               <a href="/products/{{ $category->category_slug }}"><li class="filter-list">{{ $category->category_name }}<span></span></label></li>
               </a>
@php
$index=$index+1;
@endphp
                @endforeach
            </ul>
          </form>
        </li>
      </ul>
    </div>

  </div>

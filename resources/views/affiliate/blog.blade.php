@include('affiliate.header')
	<!--================ End Header Menu Area =================-->




  <!--================Blog Area =================-->
  <section class="blog_area">
      <div class="container">
          <div class="row">
              <div class="col-lg-8">
                  <div class="blog_left_sidebar">
                      @foreach ($blogs as $blog )
                      <article class="row blog_item" >

                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="/storage/{{ $blog->blog_image }}" style=" border-radius:25px">
                                    <div class="blog_details">
                                        <a href="/blog/{{ $blog->slug}}">
                                            <h2>{{ $blog->blog_title }}</h2>
                                        </a>

                                        <a class="button button-blog" href="/blog/{{ $blog->slug}}">Read Article</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                      @endforeach


                      <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination justify-content-center" style="margin:20px 0">
                                    <li class="page-item">{{ $blogs->links() }}</li>
                                  </ul>

                      </nav>
                  </div>
              </div>
              <div class="col-lg-4">
                    <div class="blog_right_sidebar">

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Popular Posts</h3>

                            @foreach ($popular as $pop )
                            <div class="media post_item">
                                    <img height="100px" width="100px" src="/storage/{{ $pop->blog_image }}" alt="post">
                                    <div class="media-body">
                                        <a href="/blog/{{ $pop->slug }}">
                                            <h3>{{ $pop->blog_title }}</h3>
                                        </a>

                                    </div>
                                </div>
                            @endforeach


                            <div class="br"></div>
                        </aside>



                    </div>
                </div>
          </div>
      </div>
  </section>
  <!--================Blog Area =================-->



  <!--================ Start footer Area  =================-->
	@include('affiliate.footer')

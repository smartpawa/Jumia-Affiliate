@include('affiliate.header')
	<!--================ End Header Menu Area =================-->




  <!--================Blog Area =================-->
	<section class="blog_area single-post-area py-80px section-margin--small">
			<div class="container">
					<div class="row">
							<div class="col-lg-8 posts-list">
									<div class="single-post row">
											<div class="col-lg-12">
													<div class="feature-img">
															<img class="img-fluid" src="/storage/{{ $article->blog_image }}" alt="">
													</div>
											</div>


											<div class="col-lg-12">
													<div class="quotes">
                                                            {!! html_entity_decode($article->blog_content) !!}</div>

                                            </div>


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


  <!--================Instagram Area =================-->
  <section class="instagram_area">
    <div class="container box_1620">
      <div class="insta_btn">
        <a class="btn theme_btn" href="#">Follow us on instagram</a>
      </div>
      <div class="instagram_image row m0">
        <a href="#"><img src="img/instagram/ins-1.jpg" alt=""></a>
        <a href="#"><img src="img/instagram/ins-2.jpg" alt=""></a>
        <a href="#"><img src="img/instagram/ins-3.jpg" alt=""></a>
        <a href="#"><img src="img/instagram/ins-4.jpg" alt=""></a>
        <a href="#"><img src="img/instagram/ins-5.jpg" alt=""></a>
        <a href="#"><img src="img/instagram/ins-6.jpg" alt=""></a>
      </div>
    </div>
  </section>
  <!--================End Instagram Area =================-->

@include('affiliate.footer')

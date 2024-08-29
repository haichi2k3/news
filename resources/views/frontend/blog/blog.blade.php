@extends('frontend.layouts.app')
@section('content')
<style>
    .blog_details p {
         word-wrap: break-word;
         overflow-wrap: break-word;
     }
 </style>
    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach ($posts as $post)
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="{{ asset('upload/frontend/blog/' .$post->image_path) }} " width="750px" height="375px" alt="" >
                                    <a href="#" class="blog_item_date">
                                        {{-- <h3>15</h3> --}}
                                        <p>Hôm nay</p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="{{ route('blog.details', ['id' => $post->id]) }}">
                                        <h2>{{ $post->title }}</h2>
                                    </a>
                                    <p>{{ $post->description }}</p>
                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                    </ul>
                                </div>
                            </article>
                        @endforeach

                        {{-- <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{ asset('frontend/assets/img/blog/single_blog_2.png') }}"  alt="">
                                <a href="#" class="blog_item_date">
                                    <h3>15</h3>
                                    <p>Jan</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="single-blog.html">
                                    <h2>Google inks pact for new 35-storey office</h2>
                                </a>
                                <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                    he earth it first without heaven in place seed it second morning saying.</p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                </ul>
                            </div>
                        </article> --}}
                        {{-- <div class="row justify-content-center">
                            <div class="col-md-12">
                                {{ $posts->links() }}
                            </div>
                        </div> --}}


                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <nav class="blog-pagination justify-content-center d-flex">
                                    <ul class="pagination">
                                        @if ($posts->onFirstPage())
                                            <li class="page-item disabled">
                                                <span class="page-link"><i class="ti-angle-left"></i></span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a href="{{ $posts->previousPageUrl() }}" class="page-link" aria-label="Previous">
                                                    <i class="ti-angle-left"></i>
                                                </a>
                                            </li>
                                        @endif
                    
                                        @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                                            @if ($page == $posts->currentPage())
                                                <li class="page-item active">
                                                    <span class="page-link">{{ $page }}</span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                    
                                        @if ($posts->hasMorePages())
                                            <li class="page-item">
                                                <a href="{{ $posts->nextPageUrl() }}" class="page-link" aria-label="Next">
                                                    <i class="ti-angle-right"></i>
                                                </a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <span class="page-link"><i class="ti-angle-right"></i></span>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>


                        {{-- <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav> --}}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Tìm kiếm từ khóa'
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btns" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Tìm kiếm</button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Danh mục</h4>
                            <ul class="list cat-list">
                                @foreach ($category as $item)
                                    <li>
                                    <a href="#" class="d-flex">
                                        <p>{{$item->name}}</p>
                                    </a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            @foreach ($latestPosts as $post)
                                <div class="media post_item">
                                    <img src="{{ asset('upload/frontend/blog/' .$post->image_path) }}" alt="post" width="80px" height="80px">
                                    <div class="media-body">
                                    <a href="{{ route('blog.details', $post->id)}}">
                                        <h3>{{$post->title}}</h3>
                                    </a>
                                    <p>21/8/2024</p>
                                    </div>
                                </div>
                            @endforeach
                        </aside>
                        <aside class="single_sidebar_widget tag_cloud_widget">
                            <h4 class="widget_title">Tag Clouds</h4>
                            <ul class="list">
                                <li>
                                    <a href="#">Dự án</a>
                                 </li>
                                 <li>
                                    <a href="#">Tình yêu</a>
                                 </li>
                                 <li>
                                    <a href="#">Công nghệ</a>
                                 </li>
                                 <li>
                                    <a href="#">Du lịch</a>
                                 </li>
                                 <li>
                                    <a href="#">Nhà hàng</a>
                                 </li>
                                 <li>
                                    <a href="#">Khách sạn</a>
                                 </li>
                                 <li>
                                    <a href="#">Thiết kế</a>
                                 </li>
                                 <li>
                                    <a href="#">Đồ họa</a>
                                 </li>
                            </ul>
                        </aside>


                        <aside class="single_sidebar_widget instagram_feeds">
                            <h4 class="widget_title">Bản tin Instagram</h4>
                            <ul class="instagram_row flex-wrap">
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="{{ asset('frontend/assets/img/post/post_5.png') }}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="{{ asset('frontend/assets/img/post/post_6.png') }}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="{{ asset('frontend/assets/img/post/post_7.png') }}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="{{ asset('frontend/assets/img/post/post_8.png') }}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="{{ asset('frontend/assets/img/post/post_9.png') }}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="{{ asset('frontend/assets/img/post/post_10.png') }}" alt="">
                                    </a>
                                </li>
                            </ul>
                        </aside>


                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Bản tin</h4>

                            <form action="#">
                                <div class="form-group">
                                    <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email'" placeholder='Nhập email' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Đăng kí</button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
@endsection
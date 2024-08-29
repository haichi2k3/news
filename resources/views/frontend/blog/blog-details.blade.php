@extends('frontend.layouts.app')
@section('content')
<style>
   .blog_details  {
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

    .single-comment .img-comment img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        overflow: hidden;
    }
    .desc {
        max-width: calc(100% - 60px);
    }
    .replies {
       padding-left: 73px;
      }
      .comment-custom {
       border-left: 2px solid #ddd;
    }

    .fw-bold {
        font-weight: bold;
    }
    .comment {
        font-size: 1rem;
        line-height: 1.5;
        margin-bottom: 10px;
    }
    
</style>

<script>
   function checkLogin() {
      var checkLogin = '{{ Auth::check() }}';

      if(checkLogin) {
         return true;
      } else {
         alert('Bạn cần đăng nhập để bình luận.');
         return false;
      }
   }

   $(document).ready(function() {
      $('.btn-reply').click(function(event) {
         event.preventDefault();

         var parentId = $(this).data('parent-id');

         $('input[name="parent_id"]').val(parentId);
         // alert(parentId);

         $('html, body').animate({
            scrollTop:$('.comment-form').offset().top
         }, 800);
      })
   })
</script>

    <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
    <div class="container">
       <div class="row">
          <div class="col-lg-8 posts-list">
            <p class="" style="color: rgb(136, 136, 136)">Danh mục > {{$post->category->name}}</p>
             <div class="single-post">
               {{-- <ul class="blog-info-link mt-3 mb-4">
                  <li><a href="#"><i class="fa fa-user"></i> {{$post->category->name}}</a></li>
               </ul> --}}
                <div class="feature-img">
                   <img class="" src="{{ asset('upload/frontend/blog/'.$post->image_path) }}" alt=""  width="750px" height="375px">
                </div>
                <div class="blog_details">
                   <h2>{{$post->title}}</h2>

                   <ul class="blog-info-link mt-3 mb-4">
                      <li><a href="#"><i class="fa fa-user"></i> {{$post->user->name}}</a></li>
                      <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                   </ul>
                   

                   <p class="excert">
                     {!! $post->content !!}
                 </p>
                 
                   <p>
                      {{-- MCSE boot camps have its supporters and its detractors. Some people do not understand why you
                      should have to spend money on boot camp when you can get the MCSE study materials yourself at a
                      fraction of the camp price. However, who has the willpower to actually sit through a
                      self-imposed MCSE training. who has the willpower to actually --}}
                   </p>
                   <div class="quote-wrapper">
                      <div class="quotes">
                        {{$post->description}}
                      </div>
                   </div>
                   <p>
                      {{-- MCSE boot camps have its supporters and its detractors. Some people do not understand why you
                      should have to spend money on boot camp when you can get the MCSE study materials yourself at a
                      fraction of the camp price. However, who has the willpower --}}
                   </p>
                   <p>
                      {{-- MCSE boot camps have its supporters and its detractors. Some people do not understand why you
                      should have to spend money on boot camp when you can get the MCSE study materials yourself at a
                      fraction of the camp price. However, who has the willpower to actually sit through a
                      self-imposed MCSE training. who has the willpower to actually --}}
                   </p>
                </div>
             </div>
             <div class="navigation-top">
                <div class="d-sm-flex justify-content-between text-center">
                  {{-- rate  --}}
                  <div class="rate">
                     @push('rate')
                         @include('ajax.rate-ajaxRequest')
                     @endpush
                     <div class="vote">
                        @for($i=1; $i<=5; $i++)
                           <div class="star_{{ $i }} ratings_stars"><input value="{{ $i }}" type="hidden"></div>
                        @endfor
                         
                         <span class="rate-np">
                           @if ($avgRate)
                               {{ number_format($avgRate, 0) }}
                           @else 
                              Chưa có đánh giá!
                           @endif
                         </span>
                     </div> 
                 </div>
                     <div class="col-sm-4 text-center my-2 my-sm-0">
                        {{-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p>  --}}
                     </div>
                     <ul class="social-icons">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                     </ul>
                  </div>
                  
                <div class="navigation-area">
                   <div class="row">
                      @if ($previousPost)
                        <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                           <div class="thumb">
                              <a href="{{route('blog.details', $previousPost->id)}}">
                                 <img class="img-fluid" src="{{ asset('upload/frontend/blog/'. $previousPost->image_path) }}" alt="" width="60px" height="60px">
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="{{route('blog.details', $previousPost->id)}}">
                                 <span class="lnr text-white ti-arrow-left"></span>
                              </a>
                           </div>
                           <div class="detials">
                              <p>Quay lại</p>
                              <a href="{{route('blog.details', $previousPost->id)}}">
                                 {{-- <h4>{{$previousPost->title}}</h4> --}}
                              </a>
                           </div>
                        </div>
                      @endif
                      @if ($nextPost)
                        <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                           <div class="detials">
                              <p>Tiếp theo</p>
                              <a href="{{route('blog.details', $nextPost->id)}}">
                                 {{-- <h4>{{$nextPost->title}}</h4> --}}
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="{{route('blog.details', $nextPost->id)}}">
                                 <span class="lnr text-white ti-arrow-right"></span>
                              </a>
                           </div>
                           <div class="thumb">
                              <a href="{{route('blog.details', $nextPost->id)}}">
                                 <img class="img-fluid" src="{{ asset('upload/frontend/blog/'. $nextPost->image_path) }}" alt="" width="60px" height="60px">
                              </a>
                           </div>
                        </div>
                      @endif
                   </div>
                </div>
             </div>
             {{-- <div class="blog-author">
                <div class="media align-items-center">
                   <img src="{{ asset('frontend/assets/img/blog/author.png') }}" alt="">
                   <div class="media-body">
                      <a href="#">
                         <h4>Harvard milan</h4>
                      </a>
                      <p>Second divided from form fish beast made. Every of seas all gathered use saying you're, he
                         our dominion twon Second divided from</p>
                   </div>
                </div>
             </div> --}}

             
             <div class="comments-area">
                <h4>{{ $comments->count() }} Bình luận</h4>
                @if ( $comments->count() > 0)
                   @foreach ($comments as $comment)
                     @if ($comment->level == 0)
                        <div class="comment-list">
                           <div class="single-comment justify-content-between d-flex">
                              <div class="user justify-content-between d-flex">
                                 <div class="thumb" style="width: 70px; height: 70px; overflow: hidden;">
                                    <img src="{{ asset('upload/frontend/user/' . $comment->avatar_path) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                 </div>
                                 <div class="desc">
                                    <p class="comment">{{ $comment->comment }}</p>
                                    <div class="d-flex justify-content-between">
                                       <div class="d-flex align-items-center">
                                          <h5><a href="#">{{ $comment->name }}</a></h5>
                                          <p class="date">{{ $comment->created_at->locale('vi')->translatedFormat('d \t\h\á\n\g n, Y \v\à\o \l\ú\c H:i') }}</p>
                                       </div>
                                       <div class="reply-btn">
                                          <a href="#" class="btn-reply text-uppercase" data-parent-id="{{ $comment->id }}">reply</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @endif
                     @foreach ($comments as $child)
                        @if ($child->level == $comment->id)
                           <div class="replies  ms-5 mb-4">
                              <div class="comment-list comment-custom">
                                 <div class="single-comment d-flex ml-4">
                                    <div class="user  d-flex">
                                       <div class="thumb img-comment" style="width: 50px; height: 50px; overflow: hidden;">
                                          <img src="{{ asset('upload/frontend/user/' . $child->avatar_path) }}" alt=""  style="width: 100%; height: 100%; object-fit: cover;">
                                       </div>
                                       <div class="desc  ms-3">
                                          {{-- <span class="fw-bold">{{ $comment->name }}</span>: --}}
                                          <p class="comment">
                                             {{ $child->comment }}
                                         </p>
                                          <div class="d-flex justify-content-between">
                                             <div class="d-flex align-items-center">
                                                <h5><a href="#">{{ $child->name }}</a></h5>
                                                <p class="date">{{ $child->created_at->locale('vi')->translatedFormat('d \t\h\á\n\g n, Y \v\à\o \l\ú\c H:i') }}</p>
                                             </div>
                                             <div class="reply-btn">
                                                <a href="#" class="btn-reply text-uppercase" data-parent-id="{{ $comment->id }}">reply</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        @endif
                     @endforeach
                  @endforeach
                @endif
             </div>
             <div class="comment-form">
                <h4>Để lại câu trả lời</h4>
                <form class="form-contact comment_form" action="{{ route('blog.comment')}}" id="commentForm" method="POST">
                  @csrf
                   <div class="row">
                      <div class="col-12">
                         <div class="form-group">
                           <input type="hidden" name="id_blog" value="{{ $post->id}}">
                           <input type="hidden" name="parent_id" value="">
                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                               placeholder="Viết câu trả lời"></textarea>
                         </div>
                      </div>
                   </div>
                   <div class="form-group">
                      <button type="submit" class="button button-contactForm btn_1 boxed-btn" onclick="return checkLogin();">Gửi câu trả lời</button>
                   </div>
                </form>
             </div>
          </div>
          <div class="col-lg-4">
             <div class="blog_right_sidebar">
                <aside class="single_sidebar_widget search_widget">
                   <form action="#">
                      <div class="form-group">
                         <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder='Từ khóa tìm kiếm'
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
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
                      {{-- <li>
                         <a href="#" class="d-flex">
                            <p>Travel news</p>
                            <p>(10)</p>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="d-flex">
                            <p>Modern technology</p>
                            <p>(03)</p>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="d-flex">
                            <p>Product</p>
                            <p>(11)</p>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="d-flex">
                            <p>Inspiration</p>
                            <p>(21)</p>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="d-flex">
                            <p>Health Care</p>
                            <p>(21)</p>
                         </a>
                      </li> --}}
                   </ul>
                </aside>
                <aside class="single_sidebar_widget popular_post_widget">
                   <h3 class="widget_title">Bài đăng gần đây</h3>
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
                   <h4 class="widget_title">Gắn thẻ</h4>
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
 <!--================ Blog Area end =================-->
@endsection
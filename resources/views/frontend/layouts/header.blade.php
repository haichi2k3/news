<header>
    <!-- Header Start -->
   <div class="header-area">
        <div class="main-header ">
            <div class="header-top black-bg d-none d-md-block">
               <div class="container">
                   <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>     
                                    <li><img src="{{ asset('frontend/assets/img/icon/header_icon1.png') }}" alt="">34ºc, Sunny </li>
                                    <li><img src="{{ asset('frontend/assets/img/icon/header_icon1.png') }}" alt="">Tuesday, 18th June, 2019</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-social">    
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                   <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                   </div>
               </div>
            </div>
            <div class="header-mid d-none d-md-block">
               <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('frontend/assets/img/logo/logo.png') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="header-banner f-right ">
                                <img src="{{ asset('frontend/assets/img/hero/header_card.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
               </div>
            </div>
           <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                            <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href="index.html"><img src="{{ asset('frontend/assets/img/logo/logo.png') }}" alt=""></a>
                                </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>                  
                                    <ul id="navigation">    
                                        <li><a href="{{ route('index') }}">Trang chủ</a></li>
                                        <li><a href="{{ route('blog') }}">Tin Tức</a></li>
                                        <li><a href="{{ route('about') }}">Giới thiệu</a></li>
                                        <li><a href="{{ route('news') }}">Tin mới nhất</a></li>
                                        <li><a href="contact">Liên hệ</a></li>
                                        {{-- <li><a href="#">Pages</a>
                                            <ul class="submenu">
                                                <li><a href="elements.html">Element</a></li>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-blog.html">Blog Details</a></li>
                                                <li><a href="details.html">Categori Details</a></li>
                                            </ul>
                                        </li> --}}
                                        <li><a href="#">Tài khoản</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                                                <li><a href="{{ route('register') }}">Đăng kí</a></li>
                                                <li><a href="{{ route('logout') }}">Đăng Xuất</a></li>
                                                <li><a href="{{ route('author.stats')}}">Quản trị bài viết</a></li>
                                                <li><a href="{{ route('account') }}">Quản trị tài khoản</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>             
                        <div class="col-xl-2 col-lg-2 col-md-4">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <i class="fas fa-search special-tag"></i>
                                <div class="search-box">
                                    <form action="#">
                                        <input type="text" placeholder="Tìm kiếm">
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
   </div>
    <!-- Header End -->
</header>


        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Danh mục</li>
                    <li><a  href="{{ route('dashboard') }}" aria-expanded="false"><i
                                 class="icon icon-world-2"></i><span class="nav-text">Trang chủ</span></a>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                         class="icon icon-single-04"></i><span class="nav-text">Cá nhân</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('profile') }}">Thông tin</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="{{route('blog.index')}}" aria-expanded="false"><i class="icon icon-single-copy-06"></i><span
                        class="nav-text">Bài Viết</span></a></li>
                    <li><a href="{{route('blog.statistic')}}" aria-expanded="false"><i class="icon icon-chart-bar-33"></i><span
                        class="nav-text">Thống Kê</span></a></li>

                    <li><a href="{{route('categories.index')}}" aria-expanded="false"><i class="icon icon-plug"></i><span
                        class="nav-text">Loại bài viết</span></a></li>
                    <li><a href="{{route('blog.author')}}" aria-expanded="false"><i class="icon icon-form"></i><span
                        class="nav-text">Tác giả </span></a></li>


                    <li class="nav-label">Đăng xuất</li>
                    <li><a href="{{ route('admin.logout')}}" aria-expanded="false"><i class="icon icon-globe-2"></i><span
                        class="nav-text">Đăng xuất</span></a></li>
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
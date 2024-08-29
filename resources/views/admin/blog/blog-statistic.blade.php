@extends('admin.layouts.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Xin chào {{Auth::user()->name}}, Chào mừng trở lại!</h4>
                    <span class="ml-1">Thống kê bài viết</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Danh mục</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Thống kê</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thống kê bài viết</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Bài viết</th>
                                        <th>Lượt xem</th>
                                        <th>Bình luận</th>
                                        <th>Đánh giá</th>
                                        <th>Ngày đăng</th>
                                        <th>Danh mục</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>
                                                <a href="{{ route('blog.details', $post->id)}}">
                                                    <img src="{{ asset('upload/frontend/blog/'.$post->image_path) }}" alt="ảnh bìa"  width="auto" height="50px"><br>
                                                    {{ $post->title }}
                                                </a>
                                            </td>
                                            <td>{{ $post->views }} lượt</td>
                                            <td>{{ $post->countComments() }} lượt</td>
                                            <td>{{ number_format($post->averageRate(), 1) }} ({{ $post->countRates() }} đánh giá)</td>
                                            <td>{{ $post->created_at->format('d/m/Y') }}</td>
                                            <td>{{ $post->category->name }}</td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Bài viết</th>
                                        <th>Lượt xem</th>
                                        <th>Bình luận</th>
                                        <th>Đánh giá</th>
                                        <th>Ngày đăng</th>
                                        <th>Danh mục</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

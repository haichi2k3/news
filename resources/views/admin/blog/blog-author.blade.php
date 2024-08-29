@extends('admin.layouts.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Xin chào {{Auth::user()->name}}, Chào mừng trở lại!</h4>
                    <span class="ml-1">Thống kê tác giả</span>
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
                        <h4 class="card-title">Thống kê tác giả</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tác giả</th>
                                        <th>Tổng bài viết</th>
                                        <th>Tổng lượt xem</th>
                                        <th>Tổng bình luận</th>
                                        <th>Bài viết được duyệt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($authors as $author)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $author->name }}</td>
                                            <td>{{ $author->total_posts }}</td>
                                            <td>{{ $author->total_views }}</td>
                                            <td>{{ $author->total_comments }}</td>
                                            <td>{{ $author->approved_posts }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Tác giả</th>
                                        <th>Tổng bài viết</th>
                                        <th>Tổng lượt xem</th>
                                        <th>Tổng bình luận</th>
                                        <th>Bài viết được duyệt</th>
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

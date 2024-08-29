@extends('admin.layouts.app')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Xin chào {{Auth::user()->name}}, Chào mừng trở lại!</h4>
                    <span class="ml-1">Bài viết</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Danh mục</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Bài viết</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tổng hợp bài viết</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ảnh</th>
                                        <th>Tiêu đề</th>
                                        <th>Tác giả</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày đăng</th>
                                        <th>Danh mục</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td><img src="{{ asset('upload/frontend/blog/'.$post->image_path) }}" alt="ảnh bìa"  width="auto" height="50px"></td>
                                            {{-- <td>{{ $post->image_path }}</td> --}}
                                            <td>
                                                <a href="{{ route('blog.details', $post->id)}}">
                                                    {{ $post->title }}</td>
                                                </a>    
                                            <td>{{ $post->user->name }}</td>
                                            @if ($post->is_approved == 0)
                                                <td class="text-danger"><b>Đang chờ</b></td>   
                                            @else
                                                <td class="text-success"><b>Đã duyệt</b></td>   
                                            @endif
                                            <td>{{ $post->created_at->format('d/m/Y') }}</td>
                                            <td>{{ $post->category->name }}</td>
                                            <td>
                                                @if ($post->is_approved == 0)
                                                    <form action="{{ route('blog.approve', $post->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Bạn chắc chắn muốn duyệt bài viết này?')">Duyệt</button>
                                                    </form>
                                                    <form action="{{ route('blog.destroy', $post->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn chắc chắn muốn từ chối bài viết này?')">Từ chối</button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('blog.destroy', $post->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa bài viết này?')">Xóa</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ảnh</th>
                                        <th>Tiêu đề</th>
                                        <th>Tác giả</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày đăng</th>
                                        <th>Danh mục</th>
                                        <th>Tùy chọn</th>
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

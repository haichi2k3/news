@extends('frontend.layouts.app')

@section('content')
<div class="container mt-5  mb-5">
    <a href="{{ route('blog.news')}}" class="btn btn-primary btn-sm">Tạo bài viết mới</a>
    <h2 class="mt-5">Bài viết đã duyệt</h2>
    @if ($approvedPosts->count()>0)
    <table class="table">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                {{-- <th>Thao tác</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($approvedPosts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    {{-- <td>
                        <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                        <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
        
        </table>
        @else
           <p>Chưa có bài viết nào.</p>   
       @endif

    <h2>Bài viết chưa duyệt</h2>
    @if ($pendingPosts->count()>0)
    <table class="table">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($pendingPosts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>
                            <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-primary">Sửa</a>
                            <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
           <p>Chưa có bài viết nào.</p>   
       @endif

    <h2>Bài viết bị từ chối</h2>
    @if ($rejectedPosts->count()>0)
    <table class="table">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($rejectedPosts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>
                            <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-primary">Sửa</a>
                            <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
           <p>Chưa có bài viết nào.</p>   
       @endif



       {{-- h2>Bài viết bị từ chối</h2>
    @if ($posts->count()>0)
    <table class="table">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>
                            <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-primary">Sửa</a>
                            <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
           <p>Chưa có bài viết nào.</p>   
       @endif --}}
</div>
@endsection

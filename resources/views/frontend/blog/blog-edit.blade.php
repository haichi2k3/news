@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-5">
            <div class="card">
                <div class="card-header">Chỉnh Sửa Bài Viết</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('blog.update', $post->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
                        </div>

                        <div class="form-group">
                            <label for="cover_image">Ảnh Bìa</label>
                            <input type="file" class="form-control" id="cover_image" name="image_path">
                            @if($post->image_path)
                                <img src="{{ asset('upload/frontend/blog/' . $post->image_path) }}" alt="Ảnh bìa hiện tại" width="183px" height="122px">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <textarea class="form-control" id="description" name="description">{{ $post->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="content">Nội dung</label>
                            <textarea class="form-control" id="editor" name="content">{{ $post->content }}</textarea>
                        </div>

                        <div class="form-group mb-5">
                            <label for="category_id">Danh mục</label><br>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <option value="">Chọn danh mục</option>
                                @foreach($categories as $category)
                                    @if ($category->parent_id == null)
                                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @if ($category->children->count() > 0)
                                            @foreach ($category->children as $child)
                                                <option value="{{ $child->id }}" {{ $post->category_id == $child->id ? 'selected' : '' }}>-- {{ $child->name }}</option>
                                            @endforeach
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger">Cập Nhật Bài Viết</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace( 'editor', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}'
    });
</script>
@include('ckfinder::setup')
@endsection

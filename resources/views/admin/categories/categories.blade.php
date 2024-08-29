@extends('admin.layouts.app')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <h1 class="mt-4">Danh sách danh mục</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Tạo danh mục mới</a>
        
        <div class="list-group">
            @foreach($categories as $category)
                <div class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $category->name }}</strong>
                            @if($category->children)
                                <ul class="list-group list-group-flush mt-2">
                                    @foreach($category->children as $child)
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="mr-2">{{ $child->name }}</span>
                                                <div>
                                                    <a href="{{ route('categories.edit', $child->id) }}" class="btn btn-primary btn-sm mr-2">Sửa</a>
                                                    <form action="{{ route('categories.destroy', $child->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm mr-2">Sửa</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>  
</div> 
@endsection

@extends('admin.layouts.app')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <h1 class="mt-4">Chỉnh sửa danh mục</h1>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PATCH')
            
            <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}">
            </div>

            <div class="form-group">
                <label for="parent_id">Danh mục cha</label>
                <select name="parent_id" class="form-control">
                    <option value="">Không có danh mục cha</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $cat->id == $category->parent_id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>
@endsection

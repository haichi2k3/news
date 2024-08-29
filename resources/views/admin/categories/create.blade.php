@extends('admin.layouts.app')

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <h1>Tạo danh mục mới</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="parent_id">Danh mục cha</label>
                <select name="parent_id" id="parent_id" class="form-control">
                    <option value="">Không có</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tạo danh mục</button>
        </form>
    </div> 
</div>
@endsection

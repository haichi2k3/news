@extends('frontend.layouts.app')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h3 class="mb-4 text-center">Cập nhật tài khoản</h3>
            <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Tên</label>
                    <input type="text" name="name" id="name" placeholder="Tên" required class="form-control" value="{{Auth::user()->name}}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" required class="form-control" value="{{Auth::user()->email}}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" name="phone" id="phone" placeholder="Số điện thoại" required class="form-control" value="{{Auth::user()->phone}}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <input type="text" name="address" id="address" placeholder="Địa chỉ" required class="form-control" value="{{Auth::user()->address}}">
                </div>
                <div class="mb-3">
                    <label for="avatar_path" class="form-label">Ảnh đại diện</label>
                    <input type="file" name="avatar_path" id="avatar_path" required class="form-control">
                </div>
                <button type="submit" class="btn btn-primary w-100">Hoàn tất</button>
            </form>
        </div>
    </div>
</div>
@endsection

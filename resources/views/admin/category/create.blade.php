<!-- TRANG TAO CATEGORY -->
@section('title', 'Thêm danh mục')

@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card-header">
            <h3>Thêm danh mục
                <a href="{{ url('admin/category') }}" class="btn btn-primary btn-sm text-white float-end">Quay lại</a>
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Tên danh mục</label>
                        <input type="text" name="name" class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Tên đường dẫn</label>
                        <input type="text" name="slug" class="form-control">
                        @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Mô tả</label>
                        <textarea name="description" class="form-control" rows="5"></textarea>
                        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Ảnh danh mục</label><br>
                        <input type="file" name="image" class="form-control">
                        @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Trạng thái</label>
                        <input style="width:30px; height:30px" type="checkbox" name="status">
                    </div>

                    <div class="col-md-12 mb-3">
                        <h4>SEO Tags</h4>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Tiêu đề danh mục</label>
                        <input type="text" name="meta_title" class="form-control">
                        @error('meta_title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Từ khóa</label>
                        <textarea name="meta_keyword" class="form-control" rows="3"></textarea>
                        @error('meta_keyword') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Mô tả tiêu đề</label>
                        <textarea name="meta_description" class="form-control" rows="3"></textarea>
                        @error('meta_description') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary float-end">Lưu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
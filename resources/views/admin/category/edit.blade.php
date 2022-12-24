<!-- #TRANG EDIT CATEGORY -->
@section('title', 'Chỉnh sửa danh mục')

@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card-header">
            <h3>Chỉnh sửa danh mục
                <a href="{{ url('admin/category') }}" class="btn btn-primary btn-sm text-white float-end">Quay lại</a>
            </h3>
        </div>
        <div class="card-body">
            <!-- Lien ket voi id cua san pham -->
            <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Tên danh mục</label>
                        <!-- #Tra ve gia tri name ban dau cua category de edit -->
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Tên đường dẫn</label>
                        <!-- #Tra ve gia tri slug ban dau cua category de edit -->
                        <input type="text" name="slug" value="{{ $category->slug }}" class="form-control">
                        @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Mô tả</label>
                        <!-- Doi voi the textarea thi khong can dung value -->
                        <textarea name="description" class="form-control" rows="5">{{ $category->description }}</textarea>
                        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Tra ve anh ban dau cua san pham -->
                    <div class="col-md-6 mb-3">
                        <label>Ảnh danh mục</label><br>
                        <input type="file" name="image" class="form-control">
                        <!-- Lay link anh cu cua category bang ham asset lien ket toi thu muc chua anh-->
                        <img style="margin-top: 10px;" src="{{ asset($category->image) }}" width="160px" height="160px">
                        @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Trạng thái</label>
                        <input style="width:30px; height:30px" type="checkbox" name="status" {{ $category->status =='1' ? 'checked':''}} />
                    </div>

                    <div class="col-md-12 mb-3">
                        <h4 style="margin-top: 20px;">SEO Tags</h4>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Tiêu đề danh mục</label>
                        <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control">
                        @error('meta_title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Từ khóa</label>
                        <textarea name="meta_keyword" class="form-control" rows="3">{{ $category->meta_keyword }}</textarea>
                        @error('meta_keyword') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Mô tả tiêu đề</label>
                        <textarea name="meta_description" class="form-control" rows="3">{{ $category->meta_description }}</textarea>
                        @error('meta_description') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary float-end">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
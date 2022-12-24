@section('title','Thêm sản phẩm')

@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card-header">
            <h3>Thêm Sản Phẩm
                <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">
                    Quay lại
                </a>
            </h3>
        </div>
        <div class="card">
            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                    @endforeach
                </div>
                @endif

                <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                                SEO Tags
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                Chi tiết
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                Ảnh sản phẩm
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">
                                Màu sản phẩm
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Danh mục sản phẩm</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Đường dẫn sản phẩm</label>
                                <input type="text" name="slug" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Thương hiệu</label>
                                <select name="brand" class="form-control">
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Mô tả ngắn (500 từ)</label>
                                <textarea name="small_description" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Mô tả chi tiết</label>
                                <textarea name="description" class="form-control" rows="4"></textarea>
                            </div>

                        </div>
                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">

                            <div class="mb-3">
                                <label>Tiêu đề chính</label>
                                <input type="text" name="meta_title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Từ khóa</label>
                                <textarea name="meta_keyword" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Mô tả tiêu đề</label>
                                <textarea name="meta_description" class="form-control" rows="4"></textarea>
                            </div>

                        </div>
                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Giá gốc</label>
                                        <input type="text" name="original_price" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Giá giảm giá</label>
                                        <input type="text" name="selling_price" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Số lượng</label>
                                        <input type="number" name="quantity" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Trending</label>
                                        <input type="checkbox" name="trending" style="width: 30px;height:30px;">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Nổi bật</label>
                                        <input type="checkbox" name="featured" style="width: 30px;height:30px;">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Trạng thái</label>
                                        <input type="checkbox" name="status" style="width: 30px;height:30px">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Tải ảnh sản phẩm</label>
                                <input type="file" name="image[]" multiple class="form-control">
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                            <div class="mb-3">

                                <label>Màu của sản phẩm</label>
                                <hr>
                                <div class="row">
                                    @forelse($colors as $coloritem)
                                    <div class="col-md-3">

                                        <div class="p-2 border mb-3">
                                            Màu: <input type="checkbox" name="colors[{{ $coloritem->id }}]" value="{{ $coloritem->id }}">
                                            {{ $coloritem->name }}
                                            <br>
                                            Số lượng: <input type="number" name="colorquantity[{{ $coloritem->id }}]" style="width:70px; border: 1px solid;">
                                        </div>

                                    </div>
                                    @empty
                                    <div class="col-md-12">
                                        <h1>Sản phẩm không có màu khác</h1>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



@endsection
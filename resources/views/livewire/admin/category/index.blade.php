<div>
    <!-- Ham model delete cua Bootstrap -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Danh Mục Sản Phẩm</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">
                        <h6>Mày muốn xóa không?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Để suy nghỉ</button>
                        <button type="submit" class="btn btn-primary">Xóa mẹ đi</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>Danh Mục Sản Phẩm
                        <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-sm float-end">Thêm Danh Mục</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Danh Mục</th>
                                <th>Trạng Thái</th>
                                <th>Tùy Chọn</th>
                            </tr>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->status =='1' ? 'Hidden':'Visible' }}</td>
                                <td>
                                    <!-- #Lien ket voi trang edit voi id cua no -->
                                    <a href="{{ url('admin/category/'.$category->id.'/edit') }}" class="btn btn-success">Chỉnh Sửa</a>
                                    <!-- Su dung model delete cua Bootstrap -->
                                    <a href="#" wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </thead>
                    </table>
                    <div>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- An thong bao khi xoa category -->
@push('script')

<script>
    window.addEventListener('close-modal', event => {
        $('#deleteModal').modal('hide');
    })
</script>

@endpush
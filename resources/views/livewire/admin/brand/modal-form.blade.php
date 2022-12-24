<!-- Modal -->

<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm nhãn hiệu</h1>
                <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="storeBrand">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Chọn danh mục sản phẩm</label>
                        <select wire:model.defer="category_id" required class="form-control">
                            <option value="">--Chọn danh mục sản phẩm--</option>
                            @foreach ($categories as $cateItem)
                                <option value="{{ $cateItem->id }}">{{ $cateItem->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Tên nhãn hiệu</label>
                        <input type="text" wire:model.defer="name" class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Đường dẫn nhãn hiệu</label>
                        <input type="text" wire:model.defer="slug" class="form-control">
                        @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Trạng thái</label><br>
                        <input type="checkbox" wire:model.defer="status"> Checked=Hidden, Un-Checked=Visible
                        @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Brand Update Modal-->

<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật nhãn hiệu</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div wire:loading class="p-2">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div> Loading...
            </div>

            <div wire:loading.remove>                
                <form wire:submit.prevent="updateBrand">
    
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Chọn danh mục sản phẩm</label>
                            <select wire:model.defer="category_id" required class="form-control">
                                <option value="">--Chọn danh mục sản phẩm--</option>
                                @foreach ($categories as $cateItem)
                                    <option value="{{ $cateItem->id }}">{{ $cateItem->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Tên nhãn hiệu</label>
                            <input type="text" wire:model.defer="name" class="form-control">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Đường dẫn nhãn hiệu</label>
                            <input type="text" wire:model.defer="slug" class="form-control">
                            @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Trạng thái</label><br>
                            <input type="checkbox" wire:model.defer="status" style="width: 70px;"> Checked=Hidden, Un-Checked=Visible
                            @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<!-- Brand Update Modal-->

<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Brands</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div wire:loading class="p-2">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div> Loading...
            </div>

            <div wire:loading.remove>                
                <form wire:submit.prevent="destroyBrand">
    
                    <div class="modal-body">
                        <h4>A Dou Sua Ờ Bao Dát?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Thôi</button>
                        <button type="submit" class="btn btn-primary">Xóa đi</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
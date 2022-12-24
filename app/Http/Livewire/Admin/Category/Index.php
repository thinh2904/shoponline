<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id;

    // #Ham thong bao co muon xoa khong
    public function deleteCategory($category_id)
    {
        $this->category_id = $category_id;
    }

    // Ham tim id roi xoa
    public function destroyCategory()
    {
        $category = Category::find($this->category_id);
        // Xoa anh
        $path = 'uploads/category/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();
        session()->flash('message','Đã xóa Category (có không giữ mất đừng tìm)');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $categories = Category::orderBy('id','DESC')->paginate(10); #Gioi han so san pham trong 1 trang categories
        return view('livewire.admin.category.index',['categories' => $categories]);
    }
}

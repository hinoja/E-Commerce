<?php

namespace App\Http\Livewire\Admin\Category;


use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class ListCategory extends Component
{
    public $nameEdit, $editIdCategory,$delete_id;

    protected $paginationTheme = 'bootstrap';
    public function resetInput()
    {
        $this->nameEdit = "";
        $this->delete_id="";
    }
    // begin delete
    public function deleteConfirmationCategory($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('closeCategoryModal');
        // $this->dispatchBrowserEvent('confirmationDeleteCategorymodal');
    }
    public function CategorydeleteData()
    {
        $category = Category::find($this->delete_id);
        $category->delete();
        $this->dispatchBrowserEvent('close-modal');
        Toastr::success('<i class="fa fa-check"></i>User deleted successfuly ', 'Success!!');
    }


    // end delete

    public function edit($id)
    {
        $category = Category::find($id);
        $this->editIdCategory = $id;
        $this->nameEdit = $category->name;
        $this->dispatchBrowserEvent('closeCategoryModal');

    }
    public function updateCategory()
    {
        $this->validate(['nameEdit' => ['required', 'string', 'min:2', 'unique:categories,name']]);
        $categoryEdit = Category::where('id', $this->editIdCategory)->first();
        $categoryEdit->name = $this->nameEdit;
        $categoryEdit->slug = Str::slug($this->nameEdit);
        // $categoryEdit->name=$this->nameEdit;
        $categoryEdit->save();
        $this->resetInput();
        Toastr::success('<i class="fa fa-check"></i>Category updated successfuly ', 'Success!!');
        $this->dispatchBrowserEvent('closeCategoryEditModal');
    }

    public function render()
    {
        return view('livewire.admin.category.list-category', ['categories' => Category::OrderBy('created_at', 'DESC')->paginate(100)]);
    }
}

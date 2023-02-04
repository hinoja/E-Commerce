<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;


class AddCategory extends Component
{
    public $name;

    public function resetInput()
    {
        $this->name = "";
    }
    public function saveCategory()
    {
        Toastr::success('<i class="fa fa-check"></i> Category added successfuly ', 'Success!!');
        $data = $this->validate(['name' => ['required', 'string', 'min:2', 'unique:categories,name']]);
        Category::create([
            'name'=>$data['name'],
            'slug'=>Str::slug($data['name'])
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('closemodalCategory');

    }

    public function render()
    {
        return view('livewire.admin.category.add-category');
    }
}

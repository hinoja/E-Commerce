<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class ListProduct extends Component
{
    use WithPagination;
    use WithFileUploads;
    // show variable
    public $name, $price, $category, $description, $show_id, $file, $categories, $categoryId;
    public function mount()
    {
        $this->categories = Category::all();
        $this->category = collect();
    }

    public function saveProduct()
    {
        $data = $this->validate([
            'name' => ['required', 'string', 'min:2'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['required', 'string', 'max:255'],
            'file' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:8048'],
        ]);
        $dataProduct = [
            'title' =>  $this->name,
            'slug' => Str::slug($this->name),
            'price' => $this->price,
            'description' => $this->description,
            'image' => 'img',
        ];
        $product = Product::create($dataProduct);
        $product->categories()->attach($this->categoryId);
        $this->file->storePubliclyAs('product', 'img' . $product->id . '.jpg', 'public');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        Toastr::success('<i class="fa fa-check"></i> Product added successfuly ', 'Success!!');
    }


    //delete variable
    public $delete_id, $editUserId;
    protected $paginationTheme = 'bootstrap';
    public function deleteConfirmation($id)
    {
        //    $user= User::find($id);
        $this->delete_id = $id;
    }
    public function deleteUserData()
    {

        $product = Product::find($this->delete_id);
        $product->delete();
        $this->dispatchBrowserEvent('confirmationDeleteProductmodal');
        $this->dispatchBrowserEvent('close-modal');
        Toastr::success('<i class="fa fa-check"></i>Product deleted successfuly ', 'Success!!');
    }
    public function resetInput()
    {
        $this->name = "";
        $this->price = "";
        $this->category = "";
        $this->description = "";
        $this->delete_id = "";
        $this->categoryId = 0;
        $this->description = "";
        $this->file = "";
    }

    public function show($id)
    {
        $product = Product::find($id);
        $this->show_id = $product->id;
        $this->name = $product->title;
        $this->price =  $product->price;
        //
        // $transition = DB::table('category_product')->where('product_id', $product->id)->get();
        $this->category = $product->categories;
        // $this->category =  Category::where('id', $transition->category_id)->get();
        // dd($this->category);
        //
        $this->description =  $product->description;
        $this->dispatchBrowserEvent('showJobModal');
    }
    public function render()
    {
        return view('livewire.admin.product.list-product', ['products' => Product::OrderBy('created_at', 'DESC')->paginate(5)]);
    }
}

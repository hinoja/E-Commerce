<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="datatable-wrapper table-responsive">
                        <table id="datatable" class="display compact table table-striped table-bordered ">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>N°</th>
                                    {{-- <th>Image</th> --}}
                                    <th>Name</th>
                                    <th>Category</th>
                                    {{-- <th>Description</th> --}}
                                    <th>Price</th>
                                    {{-- <th>Statut</th> --}}
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/product/img' . $product->id . '.jpg') }}"
                                                alt="test" width="100" height="100">

                                        </td>
                                        <td>{{ $loop->index }}</td>
                                        <td>{{ $product->title }}</td>
                                        <td>
                                            @foreach ($product->categories as $category)
                                                {{ $category->name }}
                                            @endforeach
                                        </td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        {{-- <td>{{ $product->created_at->diffForHumans() }}</td> --}}
                                        <td> <a href="#" wire:click="show({{ $product->id }})"
                                                data-toggle="modal" data-target="#showJobModal"
                                                class="btn btn-round  btn-sm btn-outline-info"><i class="fa fa-eye"></i>
                                            </a>

                                            <a href="#" wire:click="deleteConfirmation({{ $product->id }})"
                                                data-toggle="modal" data-target="#deleteProductModal"
                                                class="btn btn-round  btn-sm btn-outline-danger"><i
                                                    class="fa fa-trash"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @empty
                                    Any Product
                                @endforelse




                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th>Title</th>
                                    <th>Location</th>
                                    {{-- <th>Description</th> --}}
                                    <th>Created By</th>
                                    <th>Salary</th>
                                    <th>Start Date</th>
                                    {{-- <th>Freelance</th> --}}
                                    <th>End Date</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>

                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>








        <div wire:ignore.self class="modal fade" id="showJobModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showJobModal">Show Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" class="mt-1 mt-sm-2" wire:submit.prevent="saveTag">

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <img style="margin-left:100px" class="txt-center"
                                            src="{{ asset('storage/product/img' . $show_id . '.jpg') }}" alt="test"
                                            width="100" height="100">
                                        <br>
                                        <label class="control-label">Name </label>
                                        <input type="text" wire:model="name" class="form-control" readonly /> <br>
                                        <label class="control-label"> Description </label>

                                        <input type="text" wire:model="description" class="form-control" readonly />
                                        <br>
                                        <label class="control-label">Price </label>
                                        <input type="text" wire:model="price" class="form-control" readonly /> <br>

                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





    {{-- modal delete confirmation User --}}
    <div wire:ignore.self class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteProductModal">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you Sure? you want to delete this Product data ?

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="button" wire:click="deleteUserData" class="btn btn-success"> Yes !
                        Delete</button>
                </div>

            </div>
        </div>
    </div>
    {{-- end modal confirmation delete User --}}


    {{-- add Product --}}
    <div wire:ignore.self class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModal">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="mt-1 mt-sm-2" wire:submit.prevent="saveProduct"
                        enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">

                                    @if ($file)
                                        <div>
                                            Photo Preview:
                                            <img width="100px"height="70px" src="{{ $file->temporaryUrl() }}">
                                        </div>
                                    @endif

                                    <label class="control-label"> Image</label>
                                    <input type="file" wire:model="file" class="form-control"
                                        placeholder="file Name here" />
                                    @error('file')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                    <br>
                                    <label class="control-label"> Name</label>
                                    <input type="text" wire:model="name" class="form-control"
                                        placeholder="  Product name here" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                    <br>
                                    <label class="control-label"> Description</label>
                                    <input type="text" wire:model="description" class="form-control"
                                        placeholder=" description Product here" />
                                    @error('description')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                    <br>
                                    <label class="control-label"> Price</label>
                                    <input type="number" wire:model="price" class="form-control"
                                        placeholder="Price Product  here (Fcfa)" min="0" />
                                    @error('price')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                    <br>
                                    <select wire:model="categoryId" class="form-control">
                                        @foreach ($categories as $category)
                                            {{-- <option wire:model="categoryId">{{ $category->name }}</option> --}}
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                    class="fa fa-times"></i></button>
                            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- end Add Product --}}



</div>

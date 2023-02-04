<div>
    {{-- listCategoryModal --}}

    <div class="modal fade" id="listCategoryModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="listCategoryModal">All Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-secondary mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $loop->index }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td> <a href="#" wire:click="edit({{ $category->id }})"
                                                data-toggle="modal" data-target="#editCategoryModal"
                                                class="btn btn-round icon-wrap  btn-sm btn btn-outline-primary"><i
                                                    class="fa fa-pencil-square-o"></i>
                                            </a>

                                            {{-- <a href="#"
                                                wire:click="deleteConfirmationCategory({{ $category->id }})"
                                                data-toggle="modal" data-target="#deleteCategoryModal"
                                                class="btn btn-round icon-wrap  btn-sm btn btn-outline-danger"><i
                                                    class="fa fa-trash"></i>
                                            </a> --}}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>
                <div class="modal-footer">
                    <ul>
                        <li> {{ $categories->links() }} </li>
                    </ul>
                    {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Add</button> --}}
                </div>
            </div>
        </div>

    </div>
    {{-- endlistCategoryModal --}}














    {{-- edit category modal --}}
    <div wire:ignore.self class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTagModal">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="mt-1 mt-sm-2" wire:submit.prevent="updateCategory()">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="control-label">Category Name</label>
                                    <input type="text" wire:model="nameEdit" class="form-control"
                                        placeholder="Tag Name here" />
                                    @error('nameEdit')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
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

    {{-- end edit tag modal --}}
</div>





{{-- modal delete confirmation Category --}}
<div wire:ignore.self class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCategoryModal">Delete Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you Sure? you want to delete this category data ?

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" wire:click="CategorydeleteData" class="btn btn-success"> Yes !
                    Delete</button>
            </div>

        </div>
    </div>
</div>
{{-- end modal confirmation delete category --}}






</div>

@push('scriptEventModal')
    <script>
        window.addEventListener('closeCategoryModal', event => {
            $('#listCategoryModal').modal('hide');
        });

        window.addEventListener('closeCategoryEditModal', event => {
            $('#editCategoryModal').modal('hide');
        });
        window.addEventListener('close-modal', event => {
            // $('#editCategoryModal').modal('hide');
            $('#deleteCategoryModal').modal('hide');
        });
    </script>
@endpush

@extends('dashboard.layouts.app')

@section('content')
    <!-- begin app-main -->
    <div class="app-main" id="main">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin row -->
            <div class="row">
                <div class="col-md-12 m-b-30">
                    <!-- begin page title -->
                    <div class="d-block d-sm-flex flex-nowrap align-items-center">
                        <div class="page-title mb-2 mb-sm-0">
                            <h1>Users
                                <a href="#" wire:click="saveUser" data-toggle="modal" data-target="#addUserModal"
                                    class="btn btn-round  btn-sm btn-outline-success"><i class="fa fa-plus"></i>
                                </a>
                            </h1>
                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="index.html"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Users</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
            </div>
            <!-- end row -->
            <!-- begin row -->
            @livewire('admin.user.list-user')

            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end app-main -->
@endsection
@push('scriptEventModal')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addUserModal').modal('hide');
        });
        window.addEventListener('close-modal', event => {
            $('#closeUserModal').modal('hide');
            $('#EditUserModal').modal('hide');
            $('#deleteUserModal').modal('hide');
        });
        window.addEventListener('confirmationDeleteUsermodal', event => {
            $('#deleteUserModal').modal('hide');
        });
        window.addEventListener('showEditUsermodal', event => {
            $('#EditUserModal').modal('show');
        });
    </script>
@endpush

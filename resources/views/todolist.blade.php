<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('ToDoList') }} --}}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200"> --}}


    <div class="bg-info" class="pb-0 text-center sm:px-6 lg:px-8" style="background-color: rgb(104, 104, 218)">


        <div class="container-fluid" style="margin-bottom:100%;">
            <div class="container w-100  " style="weight:100px;">

                <div class="card-shadow-sm text-center mt-5">
                    <div class="card-body " style="display: block;">
                        <h3 id="haut"
                            style=" font-size:2.0em;text-transform:uppercase; text-align: center;color:rgb(240, 152, 21);font-weight:bold;"
                            class="mb-10 ">Bienvenue sur Notre Mini ToDolist</h3>
                        <form action="{{ route('store') }}" method="post" autocomplete="off" class="form-control mb-0">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="content" class="form-control"
                                    placeholder="Add your new todo">
                                <button type="submit" style="background-color: gray"
                                    class="bg-dark btn btn-dark btn-sm px-4"> Plus <i class="fas fa-plus"
                                        style="color:green"></i> </button>

                            </div>

                        </form>
                        @if (count($todolists))
                            <ul class="list-group list-flush mt-3">
                                @foreach ($todolists as $todolist)
                                    <li class="list-group-item">
                                        {{-- <form action="{{ route('delete',$todolist->id) }}" method="post"> --}}
                                        {{ $todolist->content }}
                                        {{-- @csrf --}}
                                        {{-- @method('delete') --}}
                                        <a type="submit" class="btn btn-danger float-right btn-sm"
                                            href="{{ route('delete', $todolist->id) }}"> Delete <i class="fas fa-trash"
                                                style="color:red"></i> </a>
                                        {{-- </form> --}}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-center mt-3"> No Tasks !!</p>
                        @endif


                    </div>

                </div>
                <p style="text-align:center "> {{ count($todolists) }} Item(s) todo in Your List</p>
            </div>
        </div>

        <footer>
            <p>
                <a href="mailto:hinoja2@gmail.com" target="_blank">Janohi Gordon</a> - 🛒 Application Todo List avec
                Laravel 6
            </p>
            <p>
                <a href="#haut">Revenir en haut</a>
            </p>
            <style>
                footer a:hover {
                    list-style-type: none;
                    font-style: none;
                }

                footer {
                    margin-bottom: 0;

                    padding: 2.5rem;
                    color: #999;
                    text-align: center;
                    background-color: #0e7224;
                    border-top: .05rem solid #e5e5e5;


                    margin-bottom: 0;
                }

                ;
            </style>
        </footer>
    </div>


    {{-- </div>



                </div>

        </div>
    </div> --}}
</x-app-layout>

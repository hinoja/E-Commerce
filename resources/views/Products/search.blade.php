@extends('layout.Master')
@section('Content')
    <div class="row">
        <div class="row">
            @foreach ($products as $item)
                {{-- <div class="col-md-6"> --}}
                <div style="width:600px;padding:6px;"
                    class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static" style="text-align: center">
                        <strong class="d-inline-block mb-2 text-success">
                            @foreach ($item->categories as $category)
                                {{ $category->name }}{{ $loop->last ? '' : ', ' }}
                            @endforeach
                        </strong>
                        <h5 class="mb-0"> {{ $item->title }}</h5>
                        <div class="mb-1 text-muted">{{ $item->created_at }}</div>
                        <p class="mb-auto">{{ $item->subtitle }}</p>
                        <strong class="mb-auto">${{ $item->price }}</strong>

                        <a href="{{ route('products.show', $item->slug) }}" class="stretched-link btn btn-primary">voir
                            l'article</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        {{-- <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> --}}
                        <img src="{{ asset('storage/product/img' . $item->id . '.jpg') }}" alt="test" width="200"
                            height="250">
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    {{ $products->appends(request()->input())->links() }}
@endsection

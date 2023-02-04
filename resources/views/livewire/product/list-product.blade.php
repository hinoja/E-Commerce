<div>
    <div class="row">
        <div class="row ">
            @foreach ($products as $item)
                {{-- @if (request()->url('/boutique'))
                    <div class="col-md-6">
                    @else
                        <div class="col-md-12">
                @endif --}}
                <div style="width:600px;padding:6px;"
                    class=" row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <small class="d-inline-block mb-2">
                            @foreach ($item->categories as $category)
                                {{ $category->name }}{{ $loop->last ? '' : ', ' }}
                            @endforeach
                        </small>
                        <h5 class="mb-0">{{ $item->title }} </h5>
                        <p class="mb-auto text-muted">{{ $item->slug }}</p>
                        <strong class="display-4 mb-4 text-secondary">{{ $item->price }} Fcfa </strong>
                        {{-- <strong class="mb-auto font-weight-normal text-secondary">{{ $item->price }}</strong> --}}
                        <a href="{{ route('products.show', $item->slug) }}" class="stretched-link btn btn-info">Consulter
                            le
                            produit</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="{{ asset('storage/product/img' . $item->id . '.jpg') }}" alt="test" width="200"
                            height="250">
                        {{-- <img src="{{ asset('storage/'.$item->image) }}" alt="test" width="200" height="250"> --}}
                    </div>
                </div>
                {{-- </div> --}}
            @endforeach

        </div>

    </div>
    {{-- {{ $products->appends(request()->input())->links() }} --}}
    {{ $products->links() }}
</div>

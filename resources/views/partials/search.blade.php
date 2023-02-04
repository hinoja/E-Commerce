@if (!request()->routeIs('cart.index'))
    <form action="{{ route('products.search') }}" class="d-flex  mr-2" method="get">

        <div class="form-group mb-0 mr-1">
            <input type="text" name="word" class="form-control" value="{{ request()->name ?? '' }}">

        </div>
        <button class="btn btn-info" type="sublit">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img"
                viewBox="0 0 24 24" focusable="false">
                <title>Search</title>
                <circle cx="10.5" cy="10.5" r="7.5" />
                <path d="M21 21l-5.2-5.2" />
            </svg>
        </button>
    </form>
@endif

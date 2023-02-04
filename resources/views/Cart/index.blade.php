@php
    use Gloudemans\Shoppingcart\Facades\Cart;
    use App\Models\Product;
    // use App\Product;
@endphp

@extends('layout.Master')


@section('JsonMeta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('Content')

    @if (Cart::count() > 0)
        <div class=""> <a class="btn btn-success" href="{{ route('pdfView') }}">Generer Pdf</a> </div>
    @endif
    <div class="">
        @if (Cart::count() > 0)
            <div class="px-4 px-lg-0">
                <div class="pb-5">
                    <div class="row">
                        <div class="col-xs-12 col-lg-12  ">
                            <!-- For demo purpose -->
                            <div class="container text-red py-5 text-center bg-danger">
                                <h1 class="display-4"> Mon Panier </h1>
                            </div>
                            <!-- End -->

                            <div class="pb-2">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 col-xs-12">


                                            <!-- Shopping cart table -->
                                            <div class=" ">
                                                <table class="table table-bordered table-striped ">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="border-0 bg-light">
                                                                <div class="p-2 px-3 text-uppercase">Product</div>
                                                            </th>
                                                            <th scope="col" class="border-0 bg-light">
                                                                <div class="py-2 text-uppercase">Price</div>
                                                            </th>
                                                            <th scope="col" class="border-0 bg-light">
                                                                <div class="py-2 text-uppercase">Quantity</div>
                                                            </th>
                                                            <th scope="col" class="border-0 bg-light">
                                                                <div class="py-2 text-uppercase">Remove</div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach (Cart::content() as $item)
                                                            <tr>
                                                                {{-- {{ (Product::find($item->id))->image }} --}}
                                                                {{-- asset('img/img01.png') --}}
                                                                <th scope="row" class="border-0" class="text-center">
                                                                    <div class="p-2">
                                                                        <img style="margin-left:100px" class="txt-center"
                                                                        src="{{ asset('storage/product/img' . $item->id . '.jpg') }}" alt="test"
                                                                        width="100" height="100">
                                                                        {{-- <img src="{{ asset('storage/' . Product::find($item->id)->image) }}"
                                                                            alt="" width="70"
                                                                            class="img-fluid rounded shadow-sm"><br> --}}
                                                                        <div class="ml-3 d-inline-block align-middle">
                                                                            <h5 class="mb-0"> <span href="#"
                                                                                    class="text-dark d-inline-block align-middle">{{ $item->name }}
                                                                            </h5><span
                                                                                class="text-muted font-weight-normal font-italic d-block"></span>
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <td class="border-0 align-middle" class="text-center">
                                                                    <strong> {{ $item->subtotal() }} Fcfa </strong></td>
                                                                <td class="border-0 align-middle" class="text-center">
                                                                    <strong>
                                                                        <select class="quantity"
                                                                            data-id="{{ $item->rowId }}"
                                                                            data-productQuantity="{{ $item->qty }}">
                                                                            @for ($i = 1; $i < 5 + 1; $i++)
                                                                                <option
                                                                                    {{ $item->qty == $i ? 'selected' : '' }}>
                                                                                    {{ $i }}</option>
                                                                            @endfor
                                                                        </select>

                                                                    </strong>
                                                                </td>

                                                                <td class="border-0 align-middle" class="text-center">
                                                                    <form action="{{ route('cart.delete', $item->rowId) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <input class="btn btn-outline-danger" type="submit"
                                                                            value="Delete">
                                                                    </form>

                                                                </td>
                                                            </tr>
                                                            <br>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- End -->

                                        </div>
                                    </div>

                                    <div class="row py-5 p-4 bg-white rounded shadow-sm">
                                        <div class="col-lg-6">
                                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">
                                                Coupon code</div>
                                            <div class="p-4">
                                                <p class="font-italic mb-4">If you have a coupon code, please enter it in
                                                    the box below</p>
                                                <div class="input-group mb-4 border rounded-pill p-2">
                                                    <input type="text" placeholder="Apply coupon"
                                                        aria-describedby="button-addon3" class="form-control border-0">
                                                    <div class="input-group-append border-0">
                                                        <button id="button-addon3" type="button"
                                                            class="btn btn-dark px-4 rounded-pill"><i
                                                                class="fa fa-gift mr-2"></i>Apply coupon</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">
                                                Instructions for seller</div>
                                            <div class="p-4">
                                                <p class="font-italic mb-4">If you have some information for the seller you
                                                    can leave them in the box below</p>
                                                <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">
                                                Details de la commande </div>
                                            <div class="p-4">
                                                <p class="font-italic mb-4">Shipping and additional costs are calculated
                                                    based on values you have entered.</p>
                                                <ul class="list-unstyled mb-4">
                                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                            class="text-muted">Sous-total
                                                        </strong><strong>{{ Cart::subtotal() }} Fcfa</strong></li>
                                                    {{-- <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><strong>$10.00</strong></li> --}}
                                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                            class="text-muted">Tax</strong><strong>{{ Cart::tax() }}
                                                            Fcfa</strong></li>
                                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                            class="text-muted">Total</strong>
                                                        <h5 class="font-weight-bold">

                                                            @if (isset($newSubtotal))
                                                                {{ $newSubtotal }}
                                                            @else
                                                                {{ Cart::total() }} Fcfa
                                                            @endif



                                                        </h5>
                                                    </li>
                                                </ul><a href="{{ route('checkout.index') }}"
                                                    class="btn btn-dark rounded-pill py-2 btn-block">Passer à la Caisse </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-md-12">
                <h5>Votre panier est vide pour le moment.</h5>
                <p>Mais vous pouvez visiter la <a href="{{ route('products.index') }}">boutique</a> pour faire votre
                    shopping.
                </p>
            </div>
        @endif
    </div>

@endsection


@section('extra-js')
    {{-- <script>
        var qty = document.querySelectorAll('#qty');
            Array.from(qty).forEach((element) => {
                element.addEventListener('change', function () {
                    var rowId = element.getAttribute('data-id');
                    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    fetch(`/panier/${rowId}`,
                        {
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json, text-plain, */*",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-TOKEN": token
                            },
                            method: 'patch',
                            body: JSON.stringify({
                                qty: this.value
                            })
                    }).then((data) => {
                        console.log(data);
                        location.reload();
                    }).catch((error) => {
                        console.log(error);
                    });
                });
            });
  </script> --}}

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function() {

            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    window.location.href = '{{ route('cart.index') }}'
                    const id = element.getAttribute('data-id')
                    const productQuantity = element.getAttribute('data-productQuantity')

                    axios.patch(`/panier/${rowId}`, {
                            quantity: this.value,
                            productQuantity: productQuantity
                        })
                        .then(function(response) {
                            // console.log(response);
                            window.location.href = '{{ route('cart.index') }}'
                        })
                        .catch(function(error) {
                            // console.log(error);
                            window.location.href = '{{ route('cart.index') }}'
                        });
                })
            })
        })();
    </script>
@endsection

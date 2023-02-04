@extends('layout.Master')
@section('Content')
<div class="col-md-12">
    <div class="row no-gutters p-3 border rounded d-flex align-items-center flex-md-row mb-4 shadow-sm position-relative">
      <div class="col p-3 d-flex flex-column position-static">
        <muted class="d-inline-block mb-2 text-info">
          {{-- <div class="badge badge-pill badge-info">{{ $stock }}</div> --}}
          @foreach ($content->categories as $category)
              {{ $category->name }}{{ $loop->last ? '' : ', '}}
          @endforeach
        </muted>
        <h3 class="mb-4">{{ $content->title }}</h3>      <div class="mb-1 text-muted">{{ $content->created_at }}</div>
      <p class="mb-auto" style="text-align: justify">{{ $content->description }}</p>
      <strong class="mb-auto">{{ $content->price }} Fcfa </strong>
       <br>
        <form action="{{ route('cart.store') }}" method="POST">
            @csrf

            <input type="hidden" name="product_id" value="{{ $content->id  }}">


            <button type="submit" class="btn btn-dark"> Ajouter au Panier </button>
        </form>

    </div>
    <div class="col-auto d-none d-lg-block">
      {{-- <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> --}}
      {{-- <img src="{{ asset('storage/'.$content->image) }}"  id="mainImage" alt="test" width="300" height="250"> --}}
      <img style="margin-left:100px" class="txt-center"
      src="{{ asset('storage/product/img' . $content->id . '.jpg') }}" alt="test"
      id="mainImage" alt="test" width="300" height="250">
    </div>
  </div>
@endsection
@section('extra-js')
  <script>
    var mainImage = document.querySelector('#mainImage');
    var thumbnails = document.querySelectorAll('.img-thumbnail');

    thumbnails.forEach((element) => element.addEventListener('click', changeImage));

    function changeImage(e) {
      mainImage.src = this.src;
    }
  </script>
@endsection


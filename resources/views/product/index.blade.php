@extends('layouts.app')

@section('content')

<h1 class="text-center mt-2">All Products</h1>
<hr>
<br>

<div class="container">
  <div class="d-flex justify-content-center align-items-center">
    <div style="width: 18rem; max-width: 50%;">
      <a href="{{ route('admin.products') }}" class="btn btn-primary mr-22">Products List</a>
      <a href="{{ route('product.create') }}" class="btn btn-primary">Add New Product</a>
    </div>
  </div>
</div>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-12" style="display:flex; flex-wrap:wrap;">
            @foreach ($products as $product)
            <div class="card m-2 p-2" style="width: 18rem; max-width:20%;">
                <img src="/images/{{ $product-> picture }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $product->title }}</h5>
                  <h5 class="card-title">Price: ${{ $product->price }}</h5>
                  <hr>
                  <p class="card-text">{{ $product->description}} </p>
                  <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Detail</a>
                </div>
              </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

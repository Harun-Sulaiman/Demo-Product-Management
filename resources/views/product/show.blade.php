@extends('layouts.app')

@section('content')

<h1 class="text-center mt-2">{{ $product->title }} | Detail</h1>
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
        <div class="col-md-9" style="display:flex">

            <div class="container m-2 p-2">
                <img src="/images/{{ $product->picture }}" height="450px" alt="...">
                <div class="container m-2 p-2">
                  <h2>{{ $product->title }}</h2>
                  <h3>Price: RM {{ $product->price }}</h3>
                  <hr>
                  <p>{{ $product->description }}</p>
                  <a href="{{ route('product.index') }}" class="btn btn-success">Go Home</a>
                  <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5">

    <h2>Create Product</h2>
    <hr>
    
    <div class="container">
      <div class="d-flex justify-content-center align-items-center">
        <div style="width: 18rem; max-width: 30%;">
          <a href="{{ route('admin.products') }}" class="btn btn-primary">Go Back To Products List</a>
        </div>
      </div>
    </div>
    <br>

    <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-3">
            <label for="picture" class="form-label">Choose Picture</label>
            <input class="form-control" type="file" name="picture" id="picture">
          </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
          </div>

          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Enter price">
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" placeholder="Enter Description"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
</div>

@endsection

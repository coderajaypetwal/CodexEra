@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 pt-8">
    <h1 class="text-2xl font-bold mb-4">Add New Product</h1>
    <form action="{{route('products.addform')}}" method="POST">
        @csrf

  <div class="form-group">
    <label for="name">product name</label>
    <input type="text" class="form-control" id="name" aria-describedby="anme" name="name" placeholder="Enter name">
  </div>
    <div class="form-group">
    <label for="name">Product description</label>
    <input type="text" class="form-control" id="name" aria-describedby="anme" name="description" placeholder="Enter name">
  </div>
    <div class="form-group">
    <label for="name">product price</label>
    <input type="text" class="form-control" id="name" aria-describedby="anme" name="price" placeholder="Enter name">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection
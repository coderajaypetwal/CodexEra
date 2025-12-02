@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 pt-8">
    <h1 class="text-2xl font-bold mb-4">Products Listing</h1>
    <a href="{{route('products.add')}}" class="btn btn-primary mb-4">Add product</a>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Product name</th>
            <th scope="col">description</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                <td>{{$product['name']}}</td>
                <td>{{$product['description']}}</td>
                <td>{{$product['price']}}</td>
                <td><a href="{{route('products.editform',$product['id'])}}">Edit</a>
            <a href="{{route('products.delete',$product['id'])}}">Delete</a></td>
                </tr>
            @endforeach
            
        </tbody>
</table>
</div>
@endsection
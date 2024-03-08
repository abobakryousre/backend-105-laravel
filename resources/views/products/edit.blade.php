@extends('layouts.app')
@section('content')
<form action="{{route('products.update',$product['id']) }}" method="POST">
    @csrf
    @method('patch')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">ID</label>
      <input type="text" class="form-control"  name="id" value="{{$product['id']}}">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" class="form-control"  name="name" value="{{$product['name']}}">
      </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Price</label>
        <input type="text" class="form-control"  name="price" value="{{$product['price']}}">
      </div>
    <button type="submit" class="btn btn-info">Update</button>
  </form>
@endsection
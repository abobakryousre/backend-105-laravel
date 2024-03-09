@extends('layouts.app')
@section('content')
<form action="{{route('products.update',$product->id) }}" method="POST">
    @csrf
    @method('patch')

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" class="form-control"  name="name" value="{{$product->name}}">
      </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Price</label>
        <input type="text" class="form-control"  name="price" value="{{$product->price}}">
      </div>
      <select class="form-control"  name="category" id="">      
        @foreach($categories as $category)
          {{-- <option @if( $category->id == $product->category_id ) selected @endif  value="{{ $category->id }}">{{ $category->name }}</option> --}}
          <option @selected($category->id == $product->category_id)  value="{{ $category->id }}">{{ $category->name }}</option>
        
        @endforeach
      </select>
    <button type="submit" class="btn btn-info">Update</button>
  </form>
@endsection
@extends('layouts.app')
@section('title')
    Create
@endsection
@section('content')


{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}



<form action="{{route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="name">
      </div>
      @error('name')
      <div class="alert alert-danger">
        {{ $message }}
      </div>
      @enderror
      

    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="price">
      </div>
      @error('price')
      <div class="alert alert-danger">
        {{ $message }}
      </div>
      @enderror

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product Photo</label>
        <input type="file" class="form-control" id="exampleInputEmail1" name="photo">
      </div>
      <div class="mb-3">
        <select class="form-control"  name="category" id="">      
        @foreach($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>  
        @endforeach
      </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Photo</label>
        <input type="file" class="form-control"  name="photo">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection

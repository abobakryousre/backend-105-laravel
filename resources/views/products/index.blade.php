@extends('layouts.app')
@section('content')   

@if(session()->has('requestStatus'))
<div x-data="{ open: true }" x-init="setTimeout( () => open = false,3000)" >
  
  <div x-show="open" class="text-center alert alert-success">
    {{ session('requestStatus') }}
    </div>
</div>

@endif

<form class="d-flex" role="search" action="{{ route('products.index') }}" method="GET">
  <input class="form-control me-2" placeholder="Search" aria-label="Search" name="q">
  <button class="btn btn-outline-primary" type="submit">Search</button>
</form>
        <div class="text-center mt-4">

            <div class="mt-4">
                <a href="{{ route('products.create') }}" class="btn btn-success">Add new Product</a>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col"># ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Actions</th>
                  </tr>
                  
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                              {{-- <a href="/products?category_id={{$product->category->id ?? 1 }}">{{ $product->category ?  $product->category->name : "noExist" }}</a> --}}
                              <a href="{{route('products.index', ["category_id" =>$product->category->id ?? 1 ]) }}">{{ $product->category ?  $product->category->name : "noExist" }}</a>
                            </td>
                            <td>{{ $product->created_at }}</td>
                            <td>{{ $product->updated_at }}</td>
                            <td>
                                <a  class="btn btn-outline-info" href="{{ route('products.show', $product->id) }}">View</a>
                                <a  class="btn btn-outline-warning" href="{{ route('products.edit', $product->id) }}">Edit</a>
                                <form style="display: inline" action="{{route('products.destroy', $product->id) }} "method="post">
                                    @csrf
                                    @method('delete')
                                    <button  class="btn btn-outline-danger" href="#">Delete</button>
                                </form>
                                
                            </td>
                          </tr>
                    @endforeach
                    
                </tbody>
              </table>
              <div class="pagination justify-conent-center">
                {{$products->links()}}
              </div>
        </div>
       
@endsection
      


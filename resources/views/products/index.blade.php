@extends('layouts.app')
@section('content')   
@if(session()->has('requestStatus'))
<div x-data="{ open: true }" x-init="setTimeout( () => open = false,3000)" >
  
  <div x-show="open" class="text-center alert alert-success">
    {{ session('requestStatus') }}
    </div>
</div>

@endif

<form class="d-flex" role="search" action="{{ route('products.index') }}" method="GET" onsubmit="handleSearch(event)">
  <input class="form-control me-2" placeholder="Search" aria-label="Search" name="q" onkeydown="fetchSearchResult(event)" >
  <button class="btn btn-outline-primary" type="submit">Search</button>
</form>

<div class="mt-4 text-center">
  <a href="{{ route('products.create') }}" class="btn btn-success">Add new Product</a>
</div>

<div class="text-center mt-4" id="container">
    @include('partials.products._index',["products" => $products])
</div>
       
<script src="{{asset('js/main.js')}}">
</script>
@endsection
      


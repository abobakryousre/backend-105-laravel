
@extends('layouts.app')
@section('content')  
<div class="text-center mt-4">
    <div class="card">
        <div class="card-header">
            {{ $product->id }}
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
            {{ $product->name }}
            <footer class="blockquote-footer">Price:  <cite title="Source Title">{{ $product->price }}</cite></footer>
            </blockquote>
        </div>
        </div>

        <div class="card">
            <div class="card-header">
                Category
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                {{ $product->category->name }}

                </blockquote>
            </div>
            </div>
</div>
@endsection
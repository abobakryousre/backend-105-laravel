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
                <td>{{ $product->created_at->format('Y-m-d') }}</td>
                <td>{{ $product->updated_at->format('Y-m-d') }}</td>
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
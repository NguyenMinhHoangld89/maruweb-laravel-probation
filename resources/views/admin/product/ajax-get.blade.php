<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">SKU</th>
        <th scope="col">Price</th>
        <th scope="col">Category</th>
        <th scope="col">Image</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <th scope="row">{{$product->id}}</th>
            <td>{{$product->name}}</td>
            <td>{{$product->sku}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->category->name}}</td>
            <td>{!! showImage($product->image) !!}</td>
            <td>
                <a href="{{url('products/'.$product->id.'/edit')}}">
                    <button class="btn btn-sm btn-primary">Edit</button>
                </a>
                <a href="{{route('products.destroy', $product->id)}}">
                    <button class="btn btn-sm btn-danger delete" data-id="{{$product->id}}">Delete</button>
                </a>
                <form id="delete-{{$product->id}}"
                      action="{{ route('products.destroy', $product->id) }}" method="POST"
                      style="display: none;">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{$products->links()}}

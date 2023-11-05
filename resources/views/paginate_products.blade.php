<table class="table table bordered" xid="productTable">
    <thead>
        <tr>
            <th>SI</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $key => $product )


        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <a href="" class="btn btn-warning updateProductForm" data-bs-toggle="modal" data-bs-target="#updateProductModal" data-id="{{$product->id}}" data-name="{{$product->name}}" data-price="{{$product->price}}">
                    <i class="las la-edit">Edit</i></a>

                <a href="" class="btn btn-danger deleteProduct" data-id="{{$product->id}}">
                    <i class="las la-trash"></i>Delete</i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <title>Ajax Crud</title>
</head>

<body>


    <div class="container p-5 text-center">
        <div class="row">
            <h3 class="mb-5 text-info">Ajax Crud</h3>
            <div class="col-md-10 offset-1">
                <a href="#" class="btn btn-info float-end mb-4" data-bs-toggle="modal" data-bs-target="#productModal">Add Product</a>
                <table class="table table bordered" id="productTable">
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
            </div>
        </div>
    </div>



    @include('product_modal')
    @include('product_update_modal')


    @include('product_js')
    
    {!! Toastr::message() !!}


</body>

</html>
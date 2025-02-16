@extends('layouts.app')

@section('main')
    <div class="d-flex justify-content-between">
        <h5><i class="bi bi-journal-richtext me-2"></i>Product Details</h5>
        <a href="products/create" class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i>New Product</a>
    </div>
    <div class="col-md-12 table-responsive mt-3">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>S.No</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>M.R.P</th>
                    <th>Selling Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    @php 
                        $index = ($products->currentPage()-1) * $products->perPage() + $loop->iteration;
                    @endphp
                    <tr class="text-center">
                        <td>{{$index}}</td>
                        <td><img src="products/{{$product->image}}" alt="Product" style="width: 50px; height: 50px; object-fit: contain;"></td>
                        <td><a href="products/{{$product->id}}/show" class="text-decoration-none">{{$product->name}}</a></td>
                        <td>{{$product->mrp}}</td>
                        <td>{{$product->price}}</td>
                        <td class="text-center">
                            <a href="products/{{$product->id}}/edit" class="btn btn-dark btn-sm"><i class="bi bi-pencil-square"></i></a>
                            <a href="products/{{$product->id}}/delete" onclick="return confirm('Are you sure you want to Delete?')" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$products->links()}}
    </div>
@endsection
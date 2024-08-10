@extends('layouts.app')

@section('main')
    <h5><i class="bi bi-pencil-square me-2"></i>Product Details</h5>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active">View Product</li>
            </ol>
        </nav>

    <div class="card d-flex flex-row p-2" style="width: 1000px;">
        <img src="/products/{{$product->image}}" alt="{{$product->name}}" class="card-img-top" style="width: 200px;">
        <div class="card-body">
            <div class="card-title fw-bold">{{$product->name}}</div>
            <p class="card-text">{{$product->description}}</p>
            <p class="fw-bold">M.R.P <small class="text-danger">{{$product->mrp}}</small></p>
            <p class="fw-bold">Selling Price <small class="text-success">{{$product->price}}</small></p>
        </div>
    </div>
@endsection
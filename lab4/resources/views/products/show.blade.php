@extends('products.cardlayout')

@section('title')
    Product details
@endsection

@section('content')
    <div class="form-group">
        <strong >Name:</strong>
        <p >{{ $product->name }}</p>
    </div>
    <div class="form-group">
        <strong >Details:</strong>
        <p >{{ $product->description }}</p>
    </div>
    <div class="form-group">
        <strong >Count:</strong>
        <p >{{ $product->count }}</p>
    </div>
    <div class="form-group">
        <strong >Price:</strong>
        <p >{{ $product->price }}</p>
    </div>
    <div class="form-group">
        <strong >Creation date:</strong>
        <p >{{ $product->created_at }}</p>
    </div>
    <div class="form-group">
        <strong >Last update:</strong>
        <p >{{ $product->updated_at }}</p>
    </div>
@endsection

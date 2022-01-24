@extends('products.cardlayout')


@section('title')
    Edit product
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update',$product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label class="form-label">Name</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="name-icon"><i class="fas fa-box"></i></span>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name"
                   aria-label="Name" aria-describedby="name-icon">
        </div>

        <label class="form-label">Description</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="name-icon"><i class="fas fa-info"></i></span>
            <textarea class="form-control" style="height:150px" name="description" placeholder="Description"
                      required>{{ $product->description }}</textarea>
        </div>

        <label class="form-label">Count</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="name-icon"><i class="fas fa-boxes"></i></span>
            <input type="number" name="count" value="{{ $product->count }}" class="form-control" id="count"
                   placeholder="Count" required>
        </div>

        <label class="form-label">Price</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="name-icon"><i class="fas fa-dollar-sign"></i></span>
            <input type="number" name="price" value="{{ $product->price }}" class="form-control" id="price"
                   placeholder="Price" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>

    </form>
@endsection

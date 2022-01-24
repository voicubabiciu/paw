@extends('products.cardlayout')

@section('title')
    Add new product
@endsection
@section('content')
            <form method="POST" action="{{route('products.store')}}">
                @csrf
                <label  class="form-label ">Name</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="name-icon"><i class="fas fa-box"></i></span>
                    <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name-icon">
                </div>

                <label  class="form-label">Description</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="name-icon"><i class="fas fa-info"></i></span>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description" required></textarea>
                </div>

                <label  class="form-label ">Count</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="name-icon"><i class="fas fa-boxes"></i></span>
                    <input type="number" name="count" class="form-control" id="count"  placeholder="Count" required>
                </div>

                <label  class="form-label ">Price</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="name-icon"><i class="fas fa-dollar-sign"></i></span>
                    <input type="number" name="price" class="form-control" id="price"  placeholder="Price" required>
                </div>

                <input type="submit" class="btn btn-success" value="Submit">
            </form>
@endsection

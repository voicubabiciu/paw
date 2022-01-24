@extends('products.layout')

@section('home')
    Products
@endsection

@section('content')
    <div class="float-end mb-5">
        <a type="button" class="btn btn-primary" href="{{route('products.create')}}">Create Product</a>
    </div><br><br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}

        </div>

    @endif

    <table class="table  table-dark table-hover table-striped">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Count</th>
            <th scope="col">Price</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->count}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <form action="{{route('products.destroy',$product->id)}}" method="POST">

                        <a class="btn btn-light" href="{{route('products.show',$product->id)}}"><i class="far fa-eye"></i></a>

                        <a class="btn btn-warning" href="{{route('products.edit',$product->id)}}"><i class="far fa-edit"></i></a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination d-flex justify-content-center">
        {!! $products->links() !!}
    </div>
    <script>
        function test(){
            alert(2);
        }
    </script>
@endsection

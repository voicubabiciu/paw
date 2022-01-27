@extends('home.layout')

@section('title')
    Your todos
@endsection

@section('subtitle')
    <h3> Add a new todo </h3>
@endsection

@section('content')

    <form method="POST" action="@isset($todo){{route('home.update',$todo->id)}}@else{{route('home.store')}}@endisset">
        @csrf
        <label class="form-label ">Title</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="name-icon"><i class="fas fa-user"></i></span>
            <input type="text" name="title" class="form-control" placeholder="Title"
                   value="@isset($todo){{$todo->title}}@endisset" aria-label="Email"
                   aria-describedby="name-icon">
        </div>

        <label class="form-label">Description</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="name-icon"><i class="fas fa-info"></i></span>
            <textarea class="form-control" style="height:150px" name="description" placeholder="Description"
                      required>@isset($todo){{$todo->description}}@endisset</textarea>
        </div>

        <div class="row">
            <div class="col">
                @isset($todo)
                    @method('PUT')
                    <input type="submit" class="btn btn-success w-100" value="Update todo">
                @else
                    <input type="submit" class="btn btn-success w-100" value="Add todo">
                @endisset
            </div>

        </div>
    </form>


@endsection
@section('modalBody')
    <h1>Hello</h1>
    @isset($todo)
        <h1>{{$todo->title}}</h1>

    @endisset
@endsection
@section('right_content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}

        </div>

    @endif
    <table class="table  table-dark table-hover table-striped">
        <thead>
        <tr>
            <th scope="col">Solved</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($todos as $todo)
            <tr>
                <td>
                    <div class="form-check">
                        <form action="{{route('home.update',$todo->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="number" name="solved" hidden
                                   value="{{$todo->solved == 1 ? 0 :1}}">
                            <input class="form-check-input" type="checkbox" value=""
                                   {{$todo->solved == 1 ? 'checked' : ''}} onChange="this.form.submit()">
                        </form>

                    </div>
                </td>
                <td>{{$todo->title}}</td>
                <td>{{$todo->description}}</td>

                <td class="d-flex justify-content-end">
                    <form action="{{route('home.destroy',$todo->id)}}" method="POST">

                        <a class="btn btn-warning" href="{{route('home.edit',$todo->id)}}"><i
                                class="far fa-edit"></i></a>

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
        {!! $todos->links() !!}
    </div>
@endsection


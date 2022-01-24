<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        return response(['books' =>
            BookResource::collection(Book::all()),
            'message' => 'Successful'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'author' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(),
                'Validation Error']);
        }

        $employee = Book::create($data);

        return response(['book' => new
        BookResource($employee),
            'message' => 'Success'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Book $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return response(['book' => new
        BookResource($book), 'message' => 'Success'], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {

        $book->update($request->all());

        return response(['book' => new
        BookResource($book), 'message' => 'Success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return response(['message' => 'Book deleted']);
    }
}

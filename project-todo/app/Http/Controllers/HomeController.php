<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->get('userSession') == null) {
            return redirect('/login');
        }
        $todos = Todo::query()->where('userId', '=', session()->get('userId'))->paginate(5);
        return view('home.todo.index', compact('todos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $userId = session()->get('userId');
        if ($userId != null) {
            Todo::create([
                'userId' => $userId,
                'title' => $request['title'],
                'description' => $request['description'],
                'solved' => false,
            ]);
        }
        return redirect()->route('home.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $todos = Todo::latest()->paginate(5);
        $todo = Todo::query()->firstWhere('id', '=', $id);
        return view('home.todo.index', compact('todo', 'todos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $data = [];

        if ($request->has('title')) {
            $data['title'] = $request['title'];
        }
        if ($request->has('description')) {
            $data['description'] = $request['description'];
        }
        if ($request->has('solved')) {
            $data['solved'] = $request['solved'];
        }
        Todo::query()->firstWhere('id', '=', $id)->update($data);
        return redirect()->route('home.index')->with('success', 'Todo updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Todo::destroy([$id]);
        return redirect()->route('home.index')
            ->with('success', 'Todo deleted.');
    }
}

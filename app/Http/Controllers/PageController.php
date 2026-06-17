<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class PageController extends Controller
{
    public function index()
    {
        $todos = Todo::all();

        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);

        Todo::create([
            'title' => $request->title,
            'completed' => false
        ]);

        return redirect()->route('todos.index');
    }


    public function complete(Todo $todo)
    {
        $todo->update([
            'completed' => !$todo->completed
        ]);

        return redirect()->route('todos.index');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
{
    $request->validate([
        'title' => 'required|max:255'
    ]);

    $todo->update([
        'title' => $request->title
    ]);

    return redirect()->route('todos.index');
}

public function destroy(Todo $todo)
{
    $todo->delete();

    return redirect()->route('todos.index');
}
}
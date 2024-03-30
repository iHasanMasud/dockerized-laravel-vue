<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return Todo::orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        $todo = Todo::create($request->all());
        return response()->json($todo, 201);
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json(null, 204);
    }

    public function update(Request $request, Todo $todo)
    {
        $data = $request->all();
        $data['completed'] = !$todo->completed;
        $todo->update($data);
        return response()->json($todo, 200);
    }
}

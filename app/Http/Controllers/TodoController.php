<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $todos = Todo::all();
        $todos = auth()->user()->todos()->orderBy('completed')->get();
        return view('todo.home', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required'
        ]);

        auth()->user()->todos()->create($request->all());
        // $todo = Todo::create($request->all());
        // $todo->save();
        return redirect(route('todo.index'))->with('success', 'Todo Created Successfully!');
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todo.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'title'=>'required'
        ]);

        $todo = Todo::find($id);
        $todo->update($request->all());
        $todo->save();
        return redirect(route('todo.index'))->with('success', 'Todo Updated Successfully!');
    }

    public function complete($id)
    {
        $todo = Todo::find($id);
        $todo->update(['completed'=>true]);
        return redirect(route('todo.index'))->with('success', 'Todo Completed!');
    }

    public function incomplete($id)
    {
        $todo = Todo::find($id);
        $todo->update(['completed'=>false]);
        return redirect(route('todo.index'))->with('success', 'Todo Incompleted!');
    }
    
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect(route('todo.index'))->with('success', 'Todo Deleted Successfully!');
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // index method
    public function index() 
    {
        // $todos = Todo::all();
        $todos = Todo::paginate(5);
        return view('todos.index', [
            'todos' => $todos
        ]);
    }

    // Create method
    public function create() 
    {
        return view('todos.create');
    }

    public function store(TodoRequest $request) 
    {
       // return $request->all();
       $todo = Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => 0
       ]);

    //    $request->session()->flash('alert-success', 'Todo created successfully');
       
      // return redirect()->route('todos.index');
       
        $redirectUrl = '/todos.index';

        return response()->json([
            'res' => 'Todo created successfully 123',
            'status' => 'success',
            'todo' => $todo,
            'redirect_url' => route('todos.index'),
            'flash' => [
                'type' => 'success',
                'alert-success' => 'Todo created successfully',
                
            ],
        ]);
    }

    public function show($id) 
    {
        $todo = Todo::find($id);
        if (! $todo) {
            request()->session()->flash('error', 'Todo created successfully');

            return redirect()->route('todos.index')->withErrors([
                'error' => 'Unable to locate the todo'
            ]);
        }
        return view('todos.show', ['todo' => $todo]);
        
    }

    public function edit($id) 
    {
        $todo = Todo::find($id);
        if (! $todo) {
            request()->session()->flash('error', 'Todo created successfully');

            return redirect()->route('todos.edit')->withErrors([
                'error' => 'Unable to locate the todo'
            ]);
        }
        return view('todos.edit', ['todo' => $todo]);
    }

    public function update(TodoRequest $todo, Request $request) 
    {
        //$todo = Todo::find($request->todo_id);
        
        // if (! $todo) {
        //     request()->session()->flash('error', 'Todo unable to update successfully');

        //     return redirect()->route('todos.index')->withErrors([
        //         'error' => 'Unable to locate the todo'
        //     ]);
        // }


        //dd($request->is_completed);
        // $todo->update([
        //         'title' => $request->title,
        //         'description' => $request->description,
        //         'is_completed' => $request->is_completed,
        // ]);

        // $request->session()->flash('alert-success', 'Todo updated successfully');

        // return redirect()->route('todos.index');
        //return $request->all();

        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string|min:5|max:500',
            'is_completed' => 'boolean',
        ]);

        $todo->update($data);

        return redirect()->route('todos.index');
    }

    public function destroy(Request $request) {
        $todo = Todo::find($request->todo_id);

        if (! $todo) {
            request()->session()->flash('error', 'Todo unable to delete successfully');

            return redirect()->route('todos.index')->withErrors([
                'error' => 'Unable to locate the todo'
            ]);
        }  
        
        dd($todo);
    }

}

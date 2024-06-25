<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    // index method
    public function index()
    {
        //$todos = Todo::paginate(5);
        $todos = Todo::orderByDesc('created_at')->get();
        return view('todos.index', [
            'todos' => $todos
        ]);
    }

    // Create method
    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
       // return $request->all();
       $validate = Validator::make($request->all(),[
        'title' => 'required|string',
        'description' => 'required|string|min:5|max:500',
       ],[
            'title.required' => 'The title field cannot be empty',
            'description.required' => 'The descript field cannot be empty',
            'description.min'=>'It should be more than 5 characters',
       ]);

       if($validate->fails()){
            $validateerrors = $validate->errors();

            return response()->json([
                'status' => 'error',
                'errors' => $validateerrors,
            ]);
       } else {

            $todo = Todo::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'is_completed' => 0,
                    'deadline' => $request->deadline,
            ]);
            // Add ELSE STATEMENT ON CREATE

            return response()->json([
                'res' => 'Todo added successfully',
                'status' => 'success',
                'todo' => $todo,
                'redirect_url' => route('todos.index'),
                'flash' => [
                    'type' => 'success',
                    'alert-success' => 'Todo created successfully',

                ],
            ]);
        }
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        if (! $todo) {
            request()->session()->flash('error', 'Todo cannot be found');

            return redirect()->route('todos.index')->withErrors([
                'error' => 'Unable to locate the todo'
            ]);
        }
        return view('todos.show', ['todo' => $todo]);
        // return response()->json([
        //     'res' => '',
        //     'status' => 'success',
        //     'todo' => $todo,
        //     'redirect_url' => route('todos.show'),
        //     'flash' => [
        //         'type' => 'success',
        //         //'alert-success' => 'Todo created successfully',

        //     ],
        // ]);

    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        if (! $todo) {
            request()->session()->flash('error', 'Todo cannot be created');

            return redirect()->route('todos.edit')->withErrors([
                'error' => 'Unable to locate the todo'
            ]);
        }

        $options = [
            [ 'value' => 1, 'label' => 'Complete' ],
            [ 'value' => 0, 'label' => 'Incomplete' ],
        ];

        //return view('todos.edit', ['todo' => $todo]);
        return view('todos.edit', compact('todo', 'options'));
    }

    // public function update(TodoRequest $todo, Request $request)
    public function update(Request $request)
    {
        $todo = Todo::find($request->todo_id);

        if (! $todo) {
            request()->session()->flash('error', 'Todo unable to update successfully');

            return redirect()->route('todos.index')->withErrors([
                'error' => 'Unable to locate the todo'
            ]);
        } else {
            $todo->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'is_completed' => $request->is_completed,
                    'deadline' => $request->deadline,
            ]);
            $request->session()->flash('alert-success', 'Todo updated successfully');

            return redirect()->route('todos.index');
        }
        //return $request->all();

        // $data = $request->validate([
        //     'title' => 'required|string',
        //     'description' => 'required|string|min:5|max:500',
        //     'is_completed' => 'boolean',
        // ]);

        // $todo = new Todo();

        // $todo->update($data);

        // return redirect()->route('todos.index');
    }

    public function destroy(Request $request) {
        $todo = Todo::find($request->id);

        if (! $todo) {
            request()->session()->flash('error', 'Todo unable to delete successfully');

            return redirect()->route('todos.index')->withErrors([
                'error' => 'Unable to locate the todo'
            ]);
        }

        $todo->delete();
        //Todo::destroy($request->id);

        $request->session()->flash('alert-success', 'Todo deleted successfully');

        return redirect()->route('todos.index');
        //dd($todo);
    }

    public function completeTodo(Request $request) {
       $todoIds = $request->input('todoId');

       // Ensure $todoIds is an array
       if (!is_array($todoIds)) {
            return response()->json(['error' => 'Invalid input'], 400);
            // dd($todoIds, '------- show req');
       }

        // Fetch todos by their IDs
        $todos = Todo::whereIn('id', $todoIds)->get();

       // Initialize an array to store the results
        $results = [];

        foreach($todos as $todo) {
            if ($todo->is_completed !== 1) {
                $todo->is_completed = 1;
                $todo->save();

                $results[] = ['id' => $todo->id, 'status' => 'completed'];
            } else {
                $results[] = ['id' => $todo->id, 'status' => 'already completed'];
            }
            // dd($results, '========= response --------');
        }

        return response()->json([
            'status' => 200,
            'results' => $results
        ]);
    }

    public function showCompletedTodo() {
        $get_completed_todo = Todo::where('is_completed', 1)->orderByDesc('created_at')->get();
        // dd($get_completed_todo, '----- get completed todo ===========-----');
        return view('todos.complete_todo', ['get_completed_todo' => $get_completed_todo]);
    }

    public function change_status(Request $request, $id) {
        $todo = Todo::find($id);

        if ($todo) {
            $todo->is_completed = false; // Assuming `is_completed` is the field name
            $todo->save();

            return response()->json(['success' => true, 'message' => 'Status changed successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Todo item not found']);
        }
    }

    public function search(Request $request)
    {
        $search_text = $request->searchtext;
        $todos = Todo::where('title', 'LIKE', '%'.$search_text.'%')->get();

        return view('todos.search', compact('todos'));
    }

    public function dashboard() {
        return view('layouts/dashboard');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        //$tasks = Task::where('user_id',Auth::id())->orderBy('due_date')->paginate(10); 
        $tasks = Auth::user()->tasks()->paginate(10);
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.create',['task'=>new Task]);
    }

    public function store(Request $request)
    {
        $this->validation($request);
        
        $task = new Task();
        $task->user_id  = Auth::id();  //user()    // auth()->user()->id;
        $task->title    = $request->input('title'); 
        $task->status   = $request->input('status');
        $task->due_date = $request->input('due_date');
        $task->notes    = $request->input('notes'); 
        $task->save(); // Auth::user()->tasks()->create(['title' => $request('title'), ...]);

        return redirect('/tasks')->with('success', 'Task wurde erstellt.');
    }

    public function show(Task $task) // //model binding
    {             
                return view('tasks.show', ['task'=>$task]);
       
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        /*
        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:120'],
            'status' => ['required', 'in:open,done'],
            'due_date' => ['nullable', 'date'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);
        */
        $this->validation($request);

        $task->title    = $request->input('title'); 
        $task->status   = $request->input('status');
        $task->due_date = $request->input('due_date');
        $task->notes    = $request->input('notes'); 
        $task->save();

        return redirect("/tasks/$task->id")->with('success', 'Task wurde aktualisiert.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks')->with('success', 'Task wurde gelöscht.');
    }

    private function validation(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:120'],
            'status' => ['required', 'in:open,done'],
            'due_date' => ['nullable', 'date'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);
    }

}

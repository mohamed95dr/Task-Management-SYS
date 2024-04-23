<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class taskController extends Controller
{
    //
    public function index(){
        $tasks = Task::all();
        return view('tasks.index',compact('tasks'));
    }
    public function create(){
        return view('tasks.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'priority' => 'required |max:255',
            'due_date' => 'required |max:255',
            'statuses' => 'required |max:255'

        ]);
        Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'due_date' => $request->input('due_date'),
            'statuses' => $request->input('statuses')

        ]);

        return redirect()->route('tasks.index')->with('success',' Task ADD successfully');

    }

    public function edit(Task $task){
        return view('tasks.edit',compact('task'));
    }

    public function update(Request $request,Task $task){
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'priority' => 'required |in:low,medium,high',
            'due_date' => 'required |max:255',
            'statuses' => 'required |max:255'

        ]);
        $task->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'due_date' => $request->input('due_date'),
            'statuses' => $request->input('statuses')

        ]);

        return redirect()->route('tasks.index')->with('success',' Task Update successfully');

    }

    public function destory(Task $task){

        $task->delete();
        return redirect()->route('tasks.index')->with('success',' Task delete successfully');

    }

}

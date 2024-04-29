<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;



class taskController extends Controller
{
    //
    public function index(){
        // $user=user::find(1);
        // return $user->tasks;
        $tasks = Task::all();
        $users = User::all();

        return view ('tasks.index',compact('tasks','users'));
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

        $users = User::all();

        return view('tasks.edit',compact('task','users'));
    }

    public function update(Request $request,Task $task){


        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'priority' => 'required |in:low,medium,high',
            'assignment_Date' => 'required |max:255',
            'delivery_Date' => 'required |max:255',
            'statuses' => 'required |max:255',
            'user_id' => 'required |max:255'

        ]);
        $task->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'assignment_Date' => $request->input('assignment_Date'),
            'delivery_Date' => $request->input('delivery_Date'),
            'statuses' => $request->input('statuses'),
            'user_id' => $request->input('user_id')

        ]);
        return redirect()->route('tasks.index')->with('success',' Task update successfully');

    }

        public function assign(Request $request,Task $task){
            $users = User::all();
                return view('tasks.assign',compact('task','users'));
            }
            

            public function assignement(Request $request,Task $task){
                
                $request->validate([
                    'title' => 'required|max:255',
                    'description' => 'nullable',
                    'user_id' => 'required ',
        
                ]);
                $task->update([
                    'title' => $request->input('title'),
                    'user_id' => $request->input('title'),
                    'description' => $request->input('description'),
        
                ]);
                return redirect()->route('tasks.index')->with('success',' Task assignement successfully');

            }
            
    public function destory(Task $task){

        $task->delete();
        return redirect()->route('tasks.index')->with('success',' Task delete successfully');

    }

}

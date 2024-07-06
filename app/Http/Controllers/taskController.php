<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskAssignement;
use Illuminate\Http\Controllers;
use Illuminate\Support\Facades\DB;

class taskController extends Controller
{
    //
    public function index(){
        // return auth()->User()->unreadNotifications->count();
        // $user=user::find(1);
        // return $user->tasks;
        $tasks = Task::all();
        $users = User::all();

        return view ('tasks.index',compact('tasks','users'));
    }
    public function create(){
        $tasks = Task::all();
        $users = User::all();


        return view('tasks.create',compact('tasks','users'));
    }

    public function store(Request $request , Task $task){
        // return $request;

        $task_holder=User::find($request->input('user_id'));
        // return $task_holder;
        if( $task_holder == null){
        echo"1";
        }
        $request->validate([
            'title' => 'required|max:255',
            'priority' => 'required |in:low,medium,high',
            'description' => 'nullable', 
            'statuses' => 'required |max:255',
            'assignment_Date' => 'nullable',
            'delivery_Date' => 'nullable',
            'user_id' => 'nullable'
        ]);
        Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'assignment_Date' => $request->input('assignment_Date'),
            'delivery_Date' => $request->input('delivery_Date'),
            'statuses' => $request->input('statuses'),
            'user_id' => $request->input('user_id')
        ]);
        
        if( $task_holder !== null){
        $task_id = $task->id;
        $task_constructor = auth()->user()->name;
        Notification::send($task_holder,new TaskAssignement($task_id,$task->title,$task_constructor));
        }
        else
        {
            echo("there is no owner for this task");
        }
        return redirect()->route('tasks.index')->with('success',' Task ADD successfully');

    }

    public function edit(Task $task){

        $users = User::all();

        return view('tasks.edit',compact('task','users'));
    }

    public function update(Request $request,Task $task){

        // return $request;
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'priority' => 'required |in:low,medium,high',
            'assignment_Date' => 'required |max:255',
            'delivery_Date' => 'required |max:255',
            'statuses' => 'required |max:255',
            // 'user_id' => 'required |max:255'

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
            
            //////Assignement

        public function assignement(Request $request,Task $task){


                // return $request;
                $task_holder=User::find($request->input('user_id'));
                // return $task_holder;      
                $request->validate([
                    'title' => 'required|max:255',
                    'description' => 'nullable',
                    'assignment_Date' => 'required |max:255',
                    'delivery_Date' => 'required |max:255',
                    'user_id' => 'required ',
        
                ]);
                $task->update([
                    'title' => $request->input('title'),
                    'assignment_Date' => $request->input('assignment_Date'),
                    'delivery_Date' => $request->input('delivery_Date'),
                    'user_id' => $request->input('user_id'),
                    'description' => $request->input('description'),
        
                ]);
                
                $task_id = $task->id;
                // return $task_id;
                $task_constructor = auth()->user()->name;
                Notification::send($task_holder,new TaskAssignement($task_id,$task->title,$task_constructor));

                return redirect()->route('tasks.index')->with('success',' Task assignement successfully');

            }
            
    public function destory(Task $task){

        $task->delete();
        return redirect()->route('tasks.index')->with('success',' Task delete successfully');

    }

    public function show ($id){
    //   return $id;
      $task = Task::findorfail($id);
      $get_id = DB::table('notifications')->where('data->task_id',$id)->pluck('id');
      DB::table('notifications')->where('id',$get_id)->update(['read_at'=> now()]);
    //   return $get_id;
      return redirect()->route('dashboard');

       }

}

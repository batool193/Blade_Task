<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\task\StoreTaskRequest;
use App\Http\Requests\task\UpdateTaskRequest;
use Illuminate\Support\Facades\Cache;


class TaskController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $tasks =Cache::remember('tasks',3600,function()use ($user){
            return $user->tasks()->paginate(10);
        });

        return view('task.index',['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user= Auth::user();
        $storeTaskRequest = new StoreTaskRequest();
        // Get rules and messages from the Form Request
        $rules = $storeTaskRequest->rules();
        $messages = $storeTaskRequest->messages();
        $validator = Validator::make($request->all(), $rules,$messages);
            if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    else{
        $task = Task::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>'Pending',
            'user_id'=>$user->id
        ]);
        Cache::forget('tasks');
        return redirect('/task')->with('status','Task Created Successfully');
    }

    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('task.show',['task'=>$task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
     return view('task.edit',['task'=>$task]);
  }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $updateTaskRequest = new UpdateTaskRequest();

        // Get rules and messages from the Form Request
        $rules = $updateTaskRequest->rules();
        $messages = $updateTaskRequest->messages();
         $validator = Validator::make($request->all(), $rules,$messages);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    else{
         $task->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>$request->status,
        ]);
        if($request->status=='Completed')
        $task->update(['due_date'=>now()->toDate()]);
        Cache::forget('tasks');
        return redirect('/task')->with('status','Task Updated Successfully');
    }}
    public function updateStatus(Task $task)
    {
         $task->update([
            'status'=>'Completed',
            'due_date'=>now()->toDate()
        ]);
        Cache::forget('tasks');
        return redirect('/task')->with('status','Task Status Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        Cache::forget('tasks');
        return redirect('/task')->with('status','Task Deleted Successfully');

    }


}

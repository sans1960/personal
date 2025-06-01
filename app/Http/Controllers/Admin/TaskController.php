<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::paginate(10);
      
      
        return view('admin.tasks.index',compact('tasks'));
        
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
            $validated = $request->validated();
            Task::create($validated);
            
        
            Alert::success('Task created','Task creada amb exit');
            return redirect()->route('tasks.index');
        

     
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('admin.tasks.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('admin.tasks.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
          $validated = $request->validated();
           $update = $task->update($validated);
            if($update){
            Alert::success('Task updated','Task actualitzada amb exit');
            return redirect()->route('tasks.index');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
          
         $task->delete();
    
          
            Alert::success('Task deleted','Task eliminada amb exit');
            return redirect()->route('tasks.index');
        
    }
}

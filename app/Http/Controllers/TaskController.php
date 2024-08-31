<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController extends Controller
{
   
    public function index()
    {
        return new TaskCollection(Task::all());
    }


   
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        return new TaskResource($task);
    }

       public function show(Task $task)
    {
        return new TaskResource($task);
    }


    
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $validate = $request->validated();
        $task->update($validate);
        return new TaskResource($task);
    }

    
    public function destroy(Task $task)
    {
        $task->delete();
        return "DONE!";
    }
}

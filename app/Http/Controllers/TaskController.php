<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Request;

class TaskController extends Controller
{
   
    public function index()
    {
        $filters = request()->query();
        if($filters == []){
            return new TaskCollection(Task::orderBy("title", "DESC")->paginate(15));
        }
        else{
            return new TaskCollection(Task::where("status", $filters["status"])->where("title", "Oh Well I Hate Nigg")->paginate(3));
        }
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

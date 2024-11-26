<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TaskTable extends Controller


{

    public function index()
    {
        $task=Todo::all();
        return response()->json($task);
    }

    public function store(Request $request)
    {
        $task = new Todo;
        $task -> task = $request->task;
        $task -> description = $request->description;
        $task -> status = $request -> status;
        $task ->save();
        return response()->json([
            "message" => "Task Added"
        ],201);

    }

    public function show($id)
    {
        $task = Todo::find($id);
        if(!empty($task))
        {
            return response()->json($task);
        }
        else{
            return response()->json([
                "message" => "Task not found"
            ],404);
        }
    }

    public function update(Request $request,$id)
    {

        $task = Todo::find($id);
        if(Todo::where('id',$id)->exists()){
            
            $task->task=is_null($request->task) ? $task->task : $request->task;
            $task->description=is_null($request->description) ? $task->description : $request->description;
            $task->status=is_null($request->status) ? $task->status : $request->status;
            $task->save();
            return response() -> json([
                "message" => "Task updated"
            ],201);
        } else{
            return response()->json([
                "message" => "Task not found"
            ],404);
        } 
    }

    public function destroy($id)
    {
        if(Todo::where('id',$id)->exists()){
            $task = Todo::find($id);
            $task->delete();

            return response()->json([
                "message" => "Task Deleted"
            ],202);
        }else{
            return response()->json([
                "message" => "Task not found"
            ],404);
        }
    }

}

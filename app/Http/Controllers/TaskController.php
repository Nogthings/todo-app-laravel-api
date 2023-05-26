<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskCollection;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index()
    {
        return new TaskCollection(Task::where('status', 1)->orderByDesc('priority')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'start_date'=>'required',
            'complete'=>'required',
            'priority'=>'required',
            'status'=>'required',
            'task_group_id'=>'required',
        ]);

        try {

            $task = new Task();

            $task->title = $request->title;
            $task->start_date = $request->start_date;
            $task->complete = $request->complete;
            $task->priority = $request->priority;
            $task->status = $request->status;
            $task->task_group_id = $request->task_group_id;

            $task->save();

            return response()->json([
                'message'=>'Task created'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Someting goes wrong while creating a Task',
                 'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, Task $task)
    {
        try {
            $task->title = $request->title;
            $task->start_date = $request->start_date;
            $task->complete = $request->complete;
            $task->priority = $request->priority;
            $task->status = $request->status;
            $task->task_group_id = $request->task_group_id;

            $task->save();

            return response()->json([
                'message'=>'Task updated'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Someting goes wrong while editing a Task',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function updateStatus(Request $request, Task $task)
    {
        try {
            $task->status = 0;
            $task->save();
            return response()->json([
                'message'=>'Task deleted'
            ]);
        }
        catch (\Exception $e) {
            return response()->json([
                'message' => 'Someting goes wrong while deleting the task',
                'error' => $e->getMessage(),
            ]);
        };   
    }

    public function updateComplete(Request $request, Task $task)
    {
        try {
            $task->complete = 1;
            $task->save();
            return response()->json([
                'message'=>'Task done'
            ]);
        }
        catch (\Exception $e) {
            return response()->json([
                'message' => 'Someting goes wrong while completing the task',
                'error' => $e->getMessage(),
            ]);
        };   
    }
}

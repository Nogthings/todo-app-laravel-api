<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskGroupCollection;
use App\Models\TaskGroup;
use Illuminate\Http\Request;

class TaskGroupController extends Controller
{
    //
    public function index()
    {
        return new TaskGroupCollection(TaskGroup::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
        ]);

        try {

            $taskgroup = new TaskGroup;

            $taskgroup->title = $request->title;
            $taskgroup->status = $request->status;

            $taskgroup->save();

            return response()->json([
                'message'=>'Task Group created'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Someting goes wrong while creating a Task Group' 
            ], 500);
        }
    }

    public function update(Request $request, TaskGroup $taskgroup)
    {
        try {
            $taskgroup->title = $request->title;
            $taskgroup->status = $request->status;
            
            return response()->json([
                'message'=>'Task group edited'
            ]);

            $taskgroup->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Someting goes wrong while editing a Task Group',
                'error' => $e->getMessage(),
            ], 500);
        }

    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController
{
    public function home()
    {
        $tasks=Task::paginate(4);
        //  //Listing All the Tasks
        return view('home',compact('tasks'));
    }

    public function create()
    {
        return view('create_task');
    }

    public function save()
    {
        request()->validate(['title' => 'required','description' => 'required']);// Validation
        Task::create(       //Creation of New Task
            [
                'title' => request('title'),
                'description' => request('description'),
                'status' => request('status')
            ]);
        return response()->json(["res"=>"Task Created Successfully"]);
        //return redirect()->route('home')->with('message','A New Task Created Successfully');
    }

    public function edit($taskId)
    {
        $tasks = Task::find(decrypt($taskId));  //select * from tasks where task_id=$taskId
        return view('edit_task',compact('tasks'));
    }

    public function update()
    {
        request()->validate(['title' => 'required|min:3','description' => 'required']);// Validation
        $taskId = decrypt(request('task_id'));
        $tasks = Task::find($taskId);
        $tasks->update(
            [
                'title' => request('title'),
                'description' => request('description'),
                'status' => request('status')
            ] );
            return redirect()->route('home')->with('message','Task Updated Successfully');
    }
    public function delete($taskId)
    {
        Task::find(decrypt($taskId))->delete();
        return redirect()->route('home')->with('message','Task Deleted Successfully');
    }
}

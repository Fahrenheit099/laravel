<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Helpers\Contracts\ToDoListContract;
use Illuminate\Support\Facades\Auth;

class ToDoController extends Controller
{
    public function index(ToDoListContract $obj)
    {
        $to_do_list = $obj->getTasks(10);

        if ($to_do_list) {
            return view('todolist.index',compact('to_do_list'))
                                            ->with('i', (request()->input('page', 1) - 1) * 10);
        }
        return view('todolist.index');
    }

    public function store(StoreTaskRequest $request, ToDoListContract $obj)
    {
        $user = Auth::user();

        if ($obj->storeTask($request, $user)) {
           return redirect()->back()->with('success', 'Task created');
        }

        return redirect()->back()->withErrors('Something went wrong')->withInput();
    }

    public function destroy($task_id, ToDoListContract $obj) {

        $user = Auth::user();
        if ($obj->deleteTask($task_id, $user)) {
            return redirect()->route('todolist.index')->with('success', 'Task deleted');
         }
         
         return redirect()->back()->withErrors('Something went wrong')->withInput();
    }

    public function edit($task_id)
    {
        $user = Auth::user();
        $task = $user->tasks->find($task_id);

        if ($task) {
            return view('todolist.edit',compact('task'));
        }

        return redirect()->back()->withErrors('Task doesn\'t exist.');
    }

    public function update($task_id, StoreTaskRequest $request, ToDoListContract $obj)
    {
        if ($obj->updateTask($task_id, $request)) {
            return redirect()->route('todolist.index')->with('success', 'Task edited');
        }

        return redirect()->back()->withErrors('Something went wrong')->withInput();
    }
    
}

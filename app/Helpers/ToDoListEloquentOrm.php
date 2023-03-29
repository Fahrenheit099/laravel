<?php

namespace App\Helpers;

use App\Helpers\Contracts\ToDoListContract;
use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToDoListEloquentOrm implements ToDoListContract
{

    public function storeTask(FormRequest $data, User $user)
    {
        return $user->tasks()->create($data->all());
    }

    public function getTasks(int $items, string $sort = 'desc')
    {
        $user = User::find(Auth::id());

        switch ($sort) {
          case 'asc':
            return $user->tasks()->oldest()->simplePaginate($items);
            break;
          
          default:
            return $user->tasks()->latest()->simplePaginate($items);
            break;
        }
    }

    public function updateTask(int $task_id, FormRequest $data)
    {
        $user = Auth::user();
        $task = $user->tasks->find($task_id);
        
        if (!$task) {
            return false;
        }

        return $task->update($data->all());
    }

    public function deleteTask(int $task_id, User $user)
    {
        return $user->tasks()->find($task_id)->delete();
    }

}
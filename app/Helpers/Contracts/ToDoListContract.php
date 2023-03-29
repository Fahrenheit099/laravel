<?php

namespace App\Helpers\Contracts;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;

interface ToDoListContract
{
    public function storeTask(FormRequest $data, User $user);

    public function getTasks(int $items, string $sort = 'desc');

    public function updateTask(int $task_id, FormRequest $data);

    public function deleteTask(int $task_id, User $user);
}
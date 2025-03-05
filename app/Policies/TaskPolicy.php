<?php

namespace App\Policies;


use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;

class TaskPolicy
{

    use HandlesAuthorization;
    
    public function destroy(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }
}

<?php



namespace App\Repositories;

use App\Models\User;

class TaskRepository
{
    // The method is supposed to retrieve tasks for a specific user

    public function forUser(User $user)
    {
        return $user->tasks()->orderBy('created_at','asc')->get();
    }
}
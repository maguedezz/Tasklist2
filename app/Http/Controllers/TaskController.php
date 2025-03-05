<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\TaskRepository;


class TaskController extends Controller
{
    protected $tasks;

    // Redirect to home page if not authenticated

    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    public function index(Request $request) 
    {
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user())
        ]);
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|max:255'
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect()->route('index');
    }

    public function destroy(User $user,Task $task)
    {

        // dd(auth()->user());
         $this->authorize('destory', $task);

         $task->delete();

         return redirect()->route('index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Group;
class TaskController extends Controller
{
    public function index($group_id) {
        $tasks = Task::all()->where('group_id', $group_id);
        $group = Group::find($group_id);
        return view('task', ['tasks'=> $tasks, 'group'=> $group]);
    }

    public function store() {
        $task = new Task;
        $task->description = request('description');
        $task->group_id = request('group_id');
        $task->completed = false;
        $task->priority = 0;
        $task->flagged = 0;
        $task->save();

        return redirect()->back();
    }

    public function destroy($id) {
        $task = Task::find($id);
        $task->delete();

        return redirect()->back();
    }

    public function update($id) {
        $task = Task::find($id);
        $task->completed = !$task->completed;
        $task->save();

        return redirect()->back();
    }
}

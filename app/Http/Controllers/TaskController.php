<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        $categories = Category::all();

        $data['categories'] = $categories;

        return view('tasks.create', $data);
    }

    public function createAction(Request $request)
    {
        $task = $request->only(['title', 'due_date', 'category_id', 'description']);
        $task['user_id'] = 1;
        
        $dbTask = Task::create($task);

        return redirect(route('home'));

    }

    public function edit(Request $request)
    {
        $task = Task::find($request->id);

        if (!$task) {
            return redirect(route('home'));
        }

        $data['task'] = $task;

        $categories = Category::all();

        $data['categories'] = $categories;

        return view('tasks.edit', $data);
    }

    public function editAction(Request $request)
    {
        $requestData = $request->only(['title', 'due_date', 'category_id', 'description']);

        $requestData['is_done'] = $request->is_done ? true : false;

        $task = Task::find($request->id);

        if (!$task) {
            return redirect(route('home'));
        }

        $task->update($requestData);
        $task->save();

        return redirect(route('home'));
    }

    public function delete(Request $request)
    {
        $task = Task::find($request->id);

        if ($task) {
            $task->delete();
        }

        return redirect(route('home'));
    }

    public function update(Request $request)
    {
        $task = Task::findOrFail($request->taskId);

        $task->is_done = $request->status;
        $task->save();

        return ['success' => true, 'message' => 'Tarefa atualizada com sucesso!'];
    }
}

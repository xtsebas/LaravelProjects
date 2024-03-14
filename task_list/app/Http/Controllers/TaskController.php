<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Tasks;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function index(){
        return view('index', [
            'tasks' => Tasks::latest()->get()
        ]);
    }

    public function show(Tasks $task){
        return view('show', [
            'task' => $task
        ]);
    }

    public function edit(Tasks $task){
        return view('edit', [
            'task' => $task
        ]);
    }

    public function store(TaskRequest $request){
         $task = Tasks::create( $request->validated());

         return redirect()->route('tasks-show', ['task' => $task->id])
            ->with('success', 'Task Created successfully');
    }
    
    public function update(Tasks $task, TaskRequest $request){
        $data = $request->validated();
        $task->update($data);

         return redirect()->route('tasks-show', ['task' => $task->id])
            ->with('success', 'Task Updated successfully');
    }

    public function destroy(Tasks $task){
        $task->delete();

        return redirect()->route('tasks-index')
            ->with('success', 'Task deleted successfully');
    }
}

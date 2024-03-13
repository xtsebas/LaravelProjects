<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        return view('index', [
            'tasks' => \App\Models\Tasks::latest()->get()
        ]);
    }

    public function show($id){

        return view('show', [
            'task' => \App\Models\Tasks::findOrFail($id)
        ]);
    }
}

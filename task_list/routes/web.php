<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::controller(TaskController::class)->group(function () {
    Route::get("/", function () {return redirect()->route('tasks-index'); });
    Route::get("/tasks", 'index' ) -> name('tasks-index' );
    Route::view('/tasks/create','create') -> name('tasks-create');
    Route::get('/tasks/{task}', 'show' ) -> name('tasks-show');
    Route::get('/tasks/{task}/edit', 'edit' ) -> name('tasks-edit');
    Route::post('/tasks','store') -> name('tasks-store');
    Route::put('/tasks/{task}', 'update' ) -> name('tasks-update');
    Route::delete('/tasks/{task}/delete','destroy') -> name('tasks-destroy');
});

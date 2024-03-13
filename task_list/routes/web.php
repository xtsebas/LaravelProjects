<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::controller(TaskController::class)->group(function () {
    Route::get("/", function () {return redirect()->route('tasks-index'); });
    Route::get("/tasks", 'index' ) -> name('tasks-index' );
    Route::get('/tasks/{id}', 'show' ) -> name('tasks-show');
});

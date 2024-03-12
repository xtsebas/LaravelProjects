<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get("/", [TaskController::class, 'show'] );

Route::get('/{title}', [TaskController::class,'showid'] );
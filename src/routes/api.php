<?php

use App\Http\Controllers\ToDoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('todos', ToDoController::class)->except("show");
    Route::put('todos/complated/{todo}', [ToDoController::class, 'completed'])->name("todo.complated");
});
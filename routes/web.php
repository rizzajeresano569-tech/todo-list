<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'index'])->name('todos.index');

Route::post('/todos', [PageController::class, 'store'])->name('todos.store');

Route::get('/todos/{todo}/edit', [PageController::class, 'edit'])->name('todos.edit');

Route::put('/todos/{todo}', [PageController::class, 'update'])->name('todos.update');

Route::delete('/todos/{todo}', [PageController::class, 'destroy'])->name('todos.destroy');

Route::patch('/todos/{todo}/complete', [PageController::class, 'complete'])->name('todos.complete');
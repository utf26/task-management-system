<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('projects', ProjectController::class);
Route::get('projects/{project}/tasks', [ProjectController::class, 'tasks'])->name('projects.tasks');

Route::patch('/tasks/update-priority', [TaskController::class, 'updatePriority'])->name('tasks.update-priority');
Route::resource('tasks', TaskController::class);

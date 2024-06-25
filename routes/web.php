<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
   // return view('welcome');
   return redirect()->route('login');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('home', [TodoController::class, 'index'])->name('todos.index');
Route::get('/dash', [App\Http\Controllers\TodoController::class, 'dashboard'])->name('dash');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//Route::get('/home', [HomeController::class, 'todos.index'])->name('todos.index');
Route::group(['middleware' => 'auth'], function () {

    Route::get('todos', [TodoController::class, 'index'])->name('todos.index');

    Route::get('todos/create', [TodoController::class, 'create'])->name('todos.create');

    Route::get('todos/edit', [TodoController::class, 'edit'])->name('todos.edit');

    Route::post('todos/store', [TodoController::class, 'store'])->name('todos.store');

    Route::get('todos/show/{id}', [TodoController::class, 'show'])->name('todos.show');

    Route::get('todos/{id}/edit', [TodoController::class, 'edit'])->name('todos.edit');

    Route::put('todos/update', [TodoController::class, 'update'])->name('todos.update');

    Route::get('todos/{id}/destroy', [TodoController::class, 'destroy'])->name('todos.delete');

    Route::post('/completeTodo', [TodoController::class, 'completeTodo']);

    Route::get('todos/completed', [TodoController::class, 'showCompletedTodo'])->name('todos.completed');

    Route::post('change-status/{id}', [TodoController::class, 'change_status']);

    //Route::get('todos/search', 'TodoController@search');
    // Route::get('todos/search', [TodoController::class, 'search'])->name('todos.search');
    Route::post('todos/search', [TodoController::class, 'search']);
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
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

Route::controller(TodoController::class)->group(function () {
    Route::get('/', 'index')->name('all');
    Route::post('/', 'store')->name('addTodo');
    Route::delete('/{id}', 'destroy')->name('deleteTodo');
    Route::put('/{id}', 'changeStatus')->name('updateTodo');
    Route::get('/completed','getCompletedTodos')->name('completed');
    Route::get('/uncompleted','getUncompletedTodos')->name('uncompleted');
    Route::delete('/','clearList')->name('deleteAll');
});

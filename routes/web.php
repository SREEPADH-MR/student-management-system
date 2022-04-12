<?php

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('StudentManagementSystem.blank');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

/*
| Students APIs routes.
*/

Route::group([
    'prefix' => 'students',
    'middleware' => ['auth'],
    'namespace' => 'App\Http\Controllers',
    'controller' => 'StudentController',
], function () {
    Route::get('list', 'studentsList')->name('studentsListTemplate');
    Route::get('read/{studentId}', 'studentEdit')->name('studentEditTemplate');
    Route::get('create', 'studentCreate')->name('studentCreateTemplate');

    Route::post('update/{studentId}', 'studentUpdate')->name('studentUpdate');
    Route::post('create', 'studentStore')->name('studentCreate');
    Route::delete('delete/{studentId}', 'studentDelete')->name('studentDelete');
});

/*
| Students mark APIs routes.
*/

Route::group([
    'prefix' => 'students-mark',
    'middleware' => ['auth'],
    'namespace' => 'App\Http\Controllers',
    'controller' => 'StudentMarkController',
], function () {
    Route::get('list', 'studentsMarkList')->name('studentsMarkListTemplate');
    Route::get('read/{studentMarkId}', 'studentMarkEdit')->name('studentMarkEditTemplate');
    Route::get('create', 'studentMarkCreate')->name('studentMarkCreateTemplate');

    Route::post('update/{studentMarkId}', 'studentMarkUpdate')->name('studentMarkUpdate');
    Route::post('create', 'studentMarkStore')->name('studentMarkCreate');
    Route::delete('delete/{studentMarkId}', 'studentMarkDelete')->name('studentMarkDelete');
});

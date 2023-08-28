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

// Route::get('/', function () {
//     return view('dashboard.index');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');



Route::group(['prefix'=>'students','as'=>'students.', 'middleware'=>['auth']], function(){
    Route::get('/', [App\Http\Controllers\StudentsController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\StudentsController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\StudentsController::class, 'store'])->name('store');
    Route::get('/{id}/show', [App\Http\Controllers\StudentsController::class, 'show'])->name('show');
    Route::post('/listgroupe', [App\Http\Controllers\StudentsController::class, 'listgroupe'])->name('listgroupe');
    Route::put('/update', [App\Http\Controllers\StudentsController::class, 'update'])->name('update');
    Route::delete('/delete', [App\Http\Controllers\StudentsController::class, 'destroy'])->name('delete');
});


Route::group(['prefix'=>'professors','as'=>'professors.', 'middleware'=>['auth']], function(){
    Route::get('/', [App\Http\Controllers\ProfessorsController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\ProfessorsController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\ProfessorsController::class, 'store'])->name('store');
    Route::get('/{id}/show', [App\Http\Controllers\ProfessorsController::class, 'show'])->name('show');
    Route::post('/edit', [App\Http\Controllers\ProfessorsController::class, 'edit'])->name('edit');
    Route::put('/update', [App\Http\Controllers\ProfessorsController::class, 'update'])->name('update');
    Route::delete('/delete', [App\Http\Controllers\ProfessorsController::class, 'destroy'])->name('delete');
});

Route::group(['prefix'=>'levels','as'=>'levels.', 'middleware'=>['auth']], function(){
    Route::get('/', [App\Http\Controllers\LevelsController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\LevelsController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\LevelsController::class, 'store'])->name('store');
    Route::get('/classroom', [App\Http\Controllers\LevelsController::class, 'classroom'])->name('classroom');
    Route::post('/addClass', [App\Http\Controllers\LevelsController::class, 'addclass'])->name('addclass');
    Route::delete('/deleteClass', [App\Http\Controllers\LevelsController::class, 'deleteclass'])->name('deleteclass');
    Route::delete('/delete', [App\Http\Controllers\LevelsController::class, 'destroy'])->name('delete');
});
Route::group(['prefix'=>'modules','as'=>'modules.', 'middleware'=>['auth']], function(){
    Route::get('/', [App\Http\Controllers\ModulesController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\ModulesController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\ModulesController::class, 'store'])->name('store');
    Route::get('/{id}/show', [App\Http\Controllers\ModulesController::class, 'show'])->name('show');
    Route::post('/edit', [App\Http\Controllers\ModulesController::class, 'edit'])->name('edit');
    Route::put('/update', [App\Http\Controllers\ModulesController::class, 'update'])->name('update');
    Route::delete('/delete', [App\Http\Controllers\ModulesController::class, 'destroy'])->name('delete');
});
Route::group(['prefix'=>'groups','as'=>'groups.', 'middleware'=>['auth']], function(){
    Route::get('/', [App\Http\Controllers\GroupsController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\GroupsController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\GroupsController::class, 'store'])->name('store');
    Route::get('/{id}/show', [App\Http\Controllers\GroupsController::class, 'show'])->name('show');
    Route::post('/edit', [App\Http\Controllers\GroupsController::class, 'edit'])->name('edit');
    Route::post('/listModule', [App\Http\Controllers\GroupsController::class, 'listmodule'])->name('listmodule');
    Route::put('/update', [App\Http\Controllers\GroupsController::class, 'update'])->name('update');
    Route::delete('/delete', [App\Http\Controllers\GroupsController::class, 'destroy'])->name('delete');
});


Route::group(['prefix'=>'sessions','as'=>'sessions.', 'middleware'=>['auth']], function(){
    Route::get('/', [App\Http\Controllers\GrpPlannersController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\GrpPlannersController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\GrpPlannersController::class, 'store'])->name('store');
    Route::get('/{id}/show', [App\Http\Controllers\GrpPlannersController::class, 'show'])->name('show');
    Route::post('/edit', [App\Http\Controllers\GrpPlannersController::class, 'edit'])->name('edit');
    Route::post('/listDays', [App\Http\Controllers\GrpPlannersController::class, 'listdays'])->name('listdays');
    Route::post('/listevents', [App\Http\Controllers\GrpPlannersController::class, 'listevents'])->name('listevents');
    Route::post('/editevents', [App\Http\Controllers\GrpPlannersController::class, 'editevents'])->name('editevents');
    Route::put('/update', [App\Http\Controllers\GrpPlannersController::class, 'update'])->name('update');
    Route::delete('/delete', [App\Http\Controllers\GrpPlannersController::class, 'destroy'])->name('delete');
});
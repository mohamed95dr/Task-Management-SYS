<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\taskController;
use App\Http\controllers\userController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users',[userController::class,'index'])->name('users.index');
    Route::get('/users/create',[userController::class,'create'])->name('users.create');
    Route::post('/users/create/store',[userController::class,'store'])->name('users.store');


});

//


Route::get('/tasks',[taskController::class,'index'])->name('tasks.index');
Route::get('/tasks/create',[taskController::class,'create'])->name('tasks.create');
Route::post('/tasks',[taskController::class,'store'])->name('tasks.store');
Route::get('/tasks/{task}',[taskController::class,'edit'])->name('tasks.edit');
Route::put('/tasks/{task}',[taskController::class,'update'])->name('tasks.update');
Route::get('/tasks/assign/{task}',[taskController::class,'assign'])->name('tasks.assign');
Route::put('/tasks/assignement/{task}',[taskController::class,'assignement'])->name('tasks.assignement');
Route::delete('/tasks/{task}',[taskController::class,'destory'])->name('tasks.destory');
Route::get('/tasks/show/{task}',[taskController::class,'show'])->name('tasks.show');


require __DIR__.'/auth.php';
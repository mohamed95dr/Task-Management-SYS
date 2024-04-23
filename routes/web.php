<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\taskController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/tasks',[taskController::class,'index'])->name('tasks.index');
Route::get('/tasks/create',[taskController::class,'create'])->name('tasks.create');
Route::post('/tasks',[taskController::class,'store'])->name('tasks.store');

Route::get('/tasks/{task}',[taskController::class,'edit'])->name('tasks.edit');
Route::put('/tasks/{task}',[taskController::class,'update'])->name('tasks.update');

Route::delete('/tasks/{task}',[taskController::class,'destory'])->name('tasks.destory');



require __DIR__.'/auth.php';
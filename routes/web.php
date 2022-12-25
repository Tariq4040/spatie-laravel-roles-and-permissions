<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\UserController;



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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('/admin', function () {
//     return view('admin.index');
// })->middleware(['auth' , 'role:admin'])->name('admin.index');

Route::middleware(['auth' , 'role:admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/' , [IndexController::class , 'index'])->name('index');

    /////Role
    Route::get('/role' , [RoleController::class , 'index'])->name('roles');
    Route::post('/role-create' , [RoleController::class , 'store'])->name('roles-create');
    Route::get('/role/edit/{id}' , [RoleController::class,'edit'])->name('roles-edit');
    Route::put('/role/update/{id}' , [RoleController::class,'update'])->name('roles-update');
    Route::get('/role/delete/{id}' , [RoleController::class,'delete'])->name('roles-delete');

    //////Permissions
    Route::get('/permission' , [PermissionController::class,'index'])->name('permissions');
    Route::post('/permission-create' , [PermissionController::class,'store'])->name('permissions-create');
    Route::get('/permission/edit/{id}' , [PermissionController::class,'edit'])->name('permissions-edit');
    Route::put('/permission/update/{id}' , [PermissionController::class,'update'])->name('permissions-update');
    Route::get('/permission/delete/{id}' , [PermissionController::class,'delete'])->name('permissions-delete');
});
Route::get('show-users' , [UserController::class , 'index'])->name('show-users');
Route::post('add-users' , [UserController::class , 'index'])->name('add-users');

require __DIR__.'/auth.php';

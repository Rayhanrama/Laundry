<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\Customer;
use App\Models\Jenis;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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

require __DIR__.'/auth.php';

Route::get('/dashboard',[DashboardController::class, 'index'] ,function () {

    return view('dashboard',compact('transaksi','user','data','customer'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//jenis
Route::group(['middleware' => ['auth']], function(){
    Route::get('/jenis',[JenisController::class, 'index'])->name('jenis.index');
    Route::get('/jenis/create',[JenisController::class, 'create'])->name('jenis.create');
    Route::get('/jenis/show/{id}',[JenisController::class, 'show'])->name('jenis.show');
    Route::get('/jenis/edit/{id}',[JenisController::class, 'edit'])->name('jenis.edit');
    Route::patch('/jenis/{id}',[JenisController::class, 'update'])->name('jenis.update');
    Route::post('/jenis/store',[JenisController::class, 'store'])->name('jenis.store');
    Route::delete('/jenis/destroy/{id}',[JenisController::class, 'destroy'])->name('jenis.destroy');
});

//user
Route::group(['middleware' => ['auth']], function(){
    Route::get('/user',[UserController::class, 'index'])->name('users.index');
    Route::get('/user/create',[UserController::class, 'create'])->name('users.create');
    Route::get('/user/show/{id}',[UserController::class, 'show'])->name('users.show');
    Route::get('/user/edit/{id}',[UserController::class, 'edit'])->name('users.edit');
    Route::patch('/user/{id}',[UserController::class, 'update'])->name('users.update');
    Route::post('/user/store',[UserController::class, 'store'])->name('users.store');
    Route::delete('/user/destroy/{id}',[UserController::class, 'destroy'])->name('users.destroy');
});

//role
Route::group(['middleware' => ['auth']], function(){
    Route::get('/role',[RoleController::class, 'index'])->name('roles.index');
    Route::get('/role/create',[RoleController::class, 'create'])->name('roles.create');
    Route::get('/role/show/{id}',[RoleController::class, 'show'])->name('roles.show');
    Route::get('/role/edit/{id}',[RoleController::class, 'edit'])->name('roles.edit');
    Route::patch('/role/{id}',[RoleController::class, 'update'])->name('roles.update');
    Route::post('/role/store',[RoleController::class, 'store'])->name('roles.store');
    Route::delete('/role/destroy/{id}',[RoleController::class, 'destroy'])->name('roles.destroy');
});

//transaksi
Route::group(['middleware' => ['auth']], function(){
    Route::get('/transaksi',[TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/create',[TransaksiController::class, 'create'])->name('transaksi.create');
    Route::get('/transaksi/show/{id}',[TransaksiController::class, 'show'])->name('transaksi.show');
    Route::get('/transaksi/edit/{id}',[TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::patch('/transaksi/{id}',[TransaksiController::class, 'update'])->name('transaksi.update');
    Route::post('/transaksi/store',[TransaksiController::class, 'store'])->name('transaksi.store');
    Route::delete('/transaksi/destroy/{id}',[TransaksiController::class, 'destroy'])->name('transaksi.destroy');
});


//customer
Route::group(['middleware' => ['auth']], function(){
    Route::get('/customer',[CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/show/{id}',[CustomerController::class, 'show'])->name('customer.show');
    Route::delete('/customer/destroy/{id}',[CustomerController::class, 'destroy'])->name('customer.destroy');
});

//karyawan
Route::group(['middleware' => ['auth']], function(){
    Route::get('/karyawan',[KaryawanController::class, 'index'])->name('karyawan.index');
    Route::get('/karyawan/create',[KaryawanController::class, 'create'])->name('karyawan.create');
    Route::get('/karyawan/show/{id}',[KaryawanController::class, 'show'])->name('karyawan.show');
    Route::get('/karyawan/edit/{id}',[KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::patch('/karyawan/{id}',[KaryawanController::class, 'update'])->name('karyawan.update');
    Route::post('/karyawan/store',[KaryawanController::class, 'store'])->name('karyawan.store');
    Route::delete('/karyawan/destroy/{id}',[KaryawanController::class, 'destroy'])->name('karyawan.destroy');
});

//karyawan
Route::group(['middleware' => ['auth']], function(){
    Route::get('/admin',[AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create',[AdminController::class, 'create'])->name('admin.create');
    Route::get('/admin/show/{id}',[AdminController::class, 'show'])->name('admin.show');
    Route::get('/admin/edit/{id}',[AdminController::class, 'edit'])->name('admin.edit');
    Route::patch('/admin/{id}',[AdminController::class, 'update'])->name('admin.update');
    Route::post('/admin/store',[AdminController::class, 'store'])->name('admin.store');
    Route::delete('/admin/destroy/{id}',[AdminController::class, 'destroy'])->name('admin.destroy');
});


// Route::get('give', function(){
//     $role = Role::findOrFail(1);

//     $permission1 = Permission::FindOrFail(1);
//     $permission2 = Permission::FindOrFail(2);
//     $permission3 = Permission::FindOrFail(3);
//     $permission4 = Permission::FindOrFail(4);

//     $role->givePermissionTo([$permission1,$permission2,$permission3,$permission4]);
// });

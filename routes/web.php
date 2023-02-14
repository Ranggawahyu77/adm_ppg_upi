<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UndanganController;
use App\Http\Controllers\ParticipantController;



Route::get('/', function () {
    return view('welcome');
});

//Halaman Login
Route::get('/login', [LoginController::class, "index"])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, "authenticate"]);
Route::post('/logout', [LoginController::class, "logout"]);

//Halaman register
Route::get('/register', [RegisterController::class, "index"])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, "store"]);

//Kehadiran
Route::get('/register/{kegiatan}/kehadiran',[KegiatanController::class, "kehadiran"])->name('kehadiran');
Route::post('/register/{kegiatan}/kehadiran',[KegiatanController::class, "cekKehadiran"])->name('kehadiran.post');

Route::get('/register/{kegiatan}/kehadiran/create', [ParticipantController::class, "tampilPeserta"])->name('kehadiran.biodata');
Route::Post('/register/{kegiatan}/kehadiran/create', [ParticipantController::class, "daftarPeserta"])->name('kehadiran.store');
Route::get('/register/{kegiatan}/kehadiran/show', [ParticipantController::class, "detailPeserta"])->name('kehadiran.show');

Route::get('/register/{kegiatan}/kehadiran/{participant}/signature', [KegiatanController::class, "ttdPeserta"])->name('kehadiran.ttd');
Route::Post('/register/{kegiatan}/kehadiran/{participant}/signature', [KegiatanController::class, "signPeserta"])->name('kehadiran.ttd.store');




Route::middleware('auth')->group(function(){
  //Halaman Dashboard
  Route::get('/dashboard', function(){
    return view('index');
  });

  // Kegiatan
  Route::resource('/kegiatan', KegiatanController::class);
  
  Route::get('/kegiatan/{kegiatan}/print', [KegiatanController::class, "print"])->name('kegiatan.print');

  // Peserta
  Route::resource('/participant', ParticipantController::class);

  // Undangan
  Route::resource('/undangan', UndanganController::class);
});


//Admin / Spatie - Role and Permission
Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function(){
  Route::get('/', [IndexController::class, 'index'])->name('index');

  //Roles
  Route::resource('/roles', RoleController::class);
  Route::post('/role/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
  Route::delete('/role/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');

  //Permissions
  Route::resource('/permissions', PermissionController::class);
  Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
  Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');

  //Users
  Route::get('/users', [UserController::class, 'index'])->name('users.index');
  Route::get('/user/{user}', [UserController::class, 'show'])->name('users.show');
  Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
  //user Role
  Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
  Route::delete('/users/{user}/roles{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
  //user Permission
  Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
  Route::delete('/users/{user}/permissions{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
});

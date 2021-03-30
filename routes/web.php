<?php

use App\Http\Controllers\CovidController;
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
    return view('auth.login');
});
//Route::get('/', [CovidController::class, 'index']);

Route::resource('application', CovidController::class);

//datatable
Route::get('get-all-applications', [CovidController::class, 'getVendors'])->name('get-all-applications');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

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

Route::resource('application', CovidController::class)->middleware(['auth']);

//datatable
Route::get('get-all-applications', [CovidController::class, 'getVendors'])->name('get-all-applications')->middleware(['auth']);
Route::get('getcertificate/{id}',[CovidController::class, 'createPDF'])->name('getcertificate')->middleware(['auth']);
//Route::get('getcertificate',array('as'=>'pdfview','uses'=>'App\Http\Controllers\CovidController@pdfview'));


Route::get('/dashboard', [CovidController::class, 'getDashboard'])->middleware(['auth'])->name('dashboard');


Route::get('qr-code', function () {

    \QrCode::size(500)
        ->format('png')
        ->generate('Content of qr code will go here', public_path('images/health.png'));

    return view('qr-code');

});
require __DIR__.'/auth.php';

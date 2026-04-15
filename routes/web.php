<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
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
Route::get('/reports', [ReportController::class, 'index'])
->name('reports.index');

Route::get('/reports/create', function () {
    return view('report.create');
})->name('reports.create');


Route::delete('/reports/{report}', [ReportController::class, 'destroy'])
->name('reports.destroy');


Route::get('/reports/create', [ReportController::class, 'create'])
->name('reports.create');
Route::post('/reports', [ReportController::class, 'store'])
->name('reports.store');

Route::get('/reports/{report}', [ReportController::class, 'show'])
->name('reports.show');
Route::put('/reports/{report}', [ReportController::class, 'update'])
->name('reports.update');
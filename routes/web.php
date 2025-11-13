<?php

use App\Http\Controllers\CVController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [CVController::class, 'index'])->name('home');
Route::get('/pendidikan', [CVController::class, 'education'])->name('education');
Route::get('/pengalaman', [CVController::class, 'experience'])->name('experience');
Route::get('/keahlian', [CVController::class, 'skills'])->name('skills');

// Route test untuk debug
Route::get('/test-data', function() {
    $biodata = App\Models\Biodata::first();
    return response()->json([
        'biodata' => $biodata,
        'educations' => $biodata->educations,
        'experiences' => $biodata->experiences,
        'skills' => $biodata->skills,
    ]);
});

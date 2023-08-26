<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\JurysController;
use App\Http\Controllers\MemoireController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PVController;
use App\Http\Controllers\SoutenanceController;
use App\Models\Etudiant;
use App\Models\Jurys;
use App\Models\Memoire;
use App\Models\Professeur;
use App\Models\PV;
use App\Models\Soutenance;
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

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/tables.html', function () {
    return view('tables');
})->name('tables');

Route::get('/charts.html', function () {
    return view('charts');
})->name('charts');


Route::get('/dashboard1', function () {
    return view('dashboard1');
});

Route::resource('jurys', JurysController::class);
Route::resource('etudiants', EtudiantController::class);
Route::resource('professeurs', ProfesseurController::class);
Route::resource('soutenances', SoutenanceController::class);
Route::resource('pvs', PVController::class);
Route::resource('memoires', MemoireController::class);
Route::resource('filieres', FiliereController::class);


/*Route::get('/jury', [JurysController::class, 'index'])->name('jurys.index');
Route::get('/jurycreate', [JurysController::class, 'create'])->name('jurys.create');
Route::get('/jurystore', [JurysController::class, 'store'])->name('jurys.store');*/
Route::get('/juryshow/{jurys}', [JurysController::class, 'show'])->name('jurys.show');
Route::get('/juryedit/{jurys}', [JurysController::class, 'edit'])->name('jurys.edit');
Route::put('/juryupdate/{jurys}', [JurysController::class, 'update'])->name('jurys.update');
Route::get('/jurydestroy/{jurys}', [JurysController::class, 'destroy'])->name('jurys.destroy');

require __DIR__.'/auth.php';

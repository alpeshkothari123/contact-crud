<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

// XML Bulk Import
Route::get('/contacts/import', [ContactController::class, 'importForm'])->name('contacts.import.form');
Route::post('/contacts/import', [ContactController::class, 'import'])->name('contacts.import');

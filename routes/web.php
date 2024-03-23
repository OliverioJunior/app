<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;

Route::get('/', function () {
    return view('root');
});

Route::post('/upload', [FormularioController::class, 'upload'])->name('file.upload');

<?php

use App\Http\Controllers\KafkaController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'produce');

Route::get('/phpinfo', function () {
    phpinfo();
});

Route::get('/produce', KafkaController::class)->name('kafka.producer');
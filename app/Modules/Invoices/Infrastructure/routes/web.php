<?php

use App\Modules\Invoices\Controllers\InvoicesController;
use Illuminate\Support\Facades\Route;

Route::get('/{invoice}', [InvoicesController::class, 'show']);

Route::post('/approve', [InvoicesController::class, 'approve']);

Route::post('/reject', [InvoicesController::class, 'reject']);

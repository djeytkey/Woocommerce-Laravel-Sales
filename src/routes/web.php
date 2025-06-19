<?php

use Illuminate\Support\Facades\Route;
use WooSales\Report\Http\Controllers\OrderController;

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::get('/sales', [OrderController::class, 'index'])->name('woo-sales-report.sales.index');
    Route::get('/sales/{id}', [OrderController::class, 'show'])->name('woo-sales-report.sales.show');
});
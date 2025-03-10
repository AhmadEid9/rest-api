<?php

use App\Models\Invoice;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api/v1/', 'namespace' => 'App\Http\Controllers\API\V1'], function () {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('invoices', InvoiceController::class);
});

Route::get('/', function () {
    return view('welcome');
});

<?php

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\InvoiceController;
use App\Http\Controllers\Api\V1\CustomerController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['prefix'=> 'v1'], function () {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('invoices', InvoiceController::class);

    Route::post('invoices/bulk', [InvoiceController::class,'bulkStore']);

    // Route::post('invoices/bulk', 'InvoiceController@bulkStore'); 

}); 
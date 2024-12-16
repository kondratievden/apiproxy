<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiProxyController;


Route::get('/user', function (Request $request) {
     return $request->user();
 })->middleware('auth:sanctum');



Route::get('/get-number', [ApiProxyController::class, 'getNumber']);
Route::get('/get-sms', [ApiProxyController::class, 'getSms']);
Route::get('/cancel-number', [ApiProxyController::class, 'cancelNumber']);
Route::get('/get-status', [ApiProxyController::class, 'getStatus']);
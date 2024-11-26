<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskTable;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('table', function () {
    return "Hello Table! How r u??";
});

Route::get('/taskTable',[TaskTable::class,'index']);
Route::get('/taskTable/{id}',[TaskTable::class,'show']);
Route::post('/taskTable',[TaskTable::class,'store']);
Route::put('/taskTable/{id}',[TaskTable::class,'update']);
Route::delete('/taskTable/{id}',[TaskTable::class,'destroy']);



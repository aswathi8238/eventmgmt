<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\Dashcontroller;
 use App\Http\Controllers\Eventsession;
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
    return view('welcome');
});
Route::get('/h',[Dashcontroller::class,'index']);
Route::post('/bb',[Dashcontroller::class,'store']);
Route::get('/delete_contact/{event_id}',[Dashcontroller::class,'contact_delete']);
Route::get('/edit_contact/{event_id}',[Dashcontroller::class,'contact_edit']);
Route::post('/update_contact',[Dashcontroller::class,'update_contact']);

Route::get('/cc/{event_id}',[Eventsession::class,'index']);
Route::post('/speaker',[Eventsession::class,'store']);
Route::get('/sview/{event_id}',[Eventsession::class,'show']);

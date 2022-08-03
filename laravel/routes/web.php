<?php

use App\Models\Ammunition;
use App\Models\Animal;
use App\Models\Map;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/animals', function () {
    return Animal::all();
});

Route::get('/ammo', function () {
    return Ammunition::all();
});

Route::get('/map', function () {
    return Map::all();
});

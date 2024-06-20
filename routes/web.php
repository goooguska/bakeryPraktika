<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\QueryController;
use App\MoonShine\Controllers\QueryController as ControllersQueryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/{vue_capture?}', function () {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');


Route::post('/admin/page/query1', [QueryController::class, 'query1']);
// Route::post('/admin/page/query1', [QueryController::class, 'query2']);








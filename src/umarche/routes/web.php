<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComponentTestController;
use App\Http\Controllers\LifeCycleTestController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/compornent-test1', [ComponentTestController::class, 'showCompornent1']);
Route::get('/compornent-test2', [ComponentTestController::class, 'showCompornent2']);
Route::get('/servicecontainertest', [LifeCycleTestController::class, 'showsSrviceContainerTest']);
Route::get('/serviceprovidertest', [LifeCycleTestController::class, 'showsSrviceProviderContainerTest']);

require __DIR__.'/auth.php';

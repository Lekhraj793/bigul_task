<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'plans', 'as'=>'plans.'], function(){
        Route::get('/list', [App\Http\Controllers\PlanController::class, 'index'])->name('list');
        Route::get('/create', [App\Http\Controllers\PlanController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\PlanController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [App\Http\Controllers\PlanController::class, 'delete'])->name('delete');
        Route::post('/update/{id}',[App\Http\Controllers\PlanController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [App\Http\Controllers\PlanController::class, 'edit'])->name('edit');
        Route::get('/view/{id}', [App\Http\Controllers\PlanController::class, 'viewPlan'])->name('view');
    });

    Route::group(['prefix' => 'eligibility_criteria', 'as'=>'eligibility_criteria.'], function(){
        Route::get('/list', [App\Http\Controllers\EligibilityCriteriaController::class, 'index'])->name('list');
        Route::get('/create', [App\Http\Controllers\EligibilityCriteriaController::class, 'create'])->name('create');
        Route::post('store', [App\Http\Controllers\EligibilityCriteriaController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [App\Http\Controllers\EligibilityCriteriaController::class, 'delete'])->name('delete');
        Route::post('/update/{id}',[App\Http\Controllers\EligibilityCriteriaController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [App\Http\Controllers\EligibilityCriteriaController::class, 'edit'])->name('edit');
        Route::get('/view/{id}', [App\Http\Controllers\EligibilityCriteriaController::class, 'viewPlan'])->name('view');
    });

    Route::group(['prefix' => 'combo_plans', 'as'=>'combo_plans.'], function(){
        Route::get('/list', [App\Http\Controllers\ComboPlanController::class, 'index'])->name('list');
        Route::get('/create', [App\Http\Controllers\ComboPlanController::class, 'create'])->name('create');
        Route::post('store', [App\Http\Controllers\ComboPlanController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [App\Http\Controllers\ComboPlanController::class, 'delete'])->name('delete');
        Route::post('/update/{id}',[App\Http\Controllers\ComboPlanController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [App\Http\Controllers\ComboPlanController::class, 'edit'])->name('edit');
        Route::get('/view/{id}', [App\Http\Controllers\ComboPlanController::class, 'viewPlan'])->name('view');
    });
});
<?php

use Illuminate\Support\Facades\Cache;
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

Route::post('/', [\App\Http\Controllers\HomeController::class, 'handle']);
//Route::post('/', function () {return;});

Route::get('/', function () {
    return view('home');
});
Route::get('/questionnaire', function () {
    return view('pages.questionnaire');
})->name('questionnaire');

Route::post('/questionnaire', [\App\Http\Controllers\SiteControllers\QuestionnaireController::class, 'addQuestionnaire'])->name('add_questionnaire');

Route::group(['prefix' => 'practices'], function () {
    Route::get('who_is_hungry', [\App\Http\Controllers\SiteControllers\Practices\HungryController::class, 'index'])->name('who_is_hungry');
});

Route::group(['prefix' => 'pay'], function () {
    Route::get('success', function () {
        return view('pages.pay.success');
    });
    Route::get('reject', function () {
        return view('pages.pay.reject');
    });
    Route::get('take_a_part', function () {
        return view('pages.pay.form');
    })->name('take_a_part');

    Route::post('sent_payment', [\App\Http\Controllers\SiteControllers\PayController::class, 'pay'])->name('sent_payment');
});

Route::group(['prefix' => 'information'], function () {
    Route::get('service_rules', function () {
        return view('pages.information.service_rules');
    })->name('service_rules');
    Route::get('offer', function () {
        return view('pages.information.offer');
    })->name('offer');
    Route::get('privacy', function () {
        return view('pages.information.privacy');
    })->name('privacy');

});



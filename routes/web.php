<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('billing/plans', 'SubscriptionController@showBillingPlans')->name('billing.plans');
Route::get('billing/cancel', 'SubscriptionController@cancel')->name('billing.cancel');
Route::get('billing/restart', 'SubscriptionController@restart')->name('billing.restart');
Route::get('billing/process', 'SubscriptionController@handlePaystackCallback')->name('billing.process');
Route::post('billing/process', 'SubscriptionController@handlePaystackPostCallBack')->name('billing.process.post');

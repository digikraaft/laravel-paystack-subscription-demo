<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Paystack Keys
    |--------------------------------------------------------------------------
    |
    | The Paystack publishable key and secret key. You can get these from your Paystack dashboard.
    |
    */

    'public_key' => env('PAYSTACK_PUBLIC_KEY'),

    'secret' => env('PAYSTACK_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Subscription Model
    |--------------------------------------------------------------------------
    |
    | This is the model in your application that implements the Billable trait
    | provided by PaystackSubscription. It will serve as the primary model you use while
    | interacting with PaystackSubscription related methods, subscriptions, etc.
    |
    */
    'model' => env('SUBSCRIPTION_MODEL', App\User::class),

    /*
   |--------------------------------------------------------------------------
   | User Table
   |--------------------------------------------------------------------------
   |
   | This is the table in your application where your users' information is stored.
   |
   */
    'user_table' => 'users',

    /*
   |--------------------------------------------------------------------------
   | Subscription Table
   |--------------------------------------------------------------------------
   |
   | The name of the table used to store subscription details.
   |
   */
    'subscription_table' => 'dk_subscriptions',

];

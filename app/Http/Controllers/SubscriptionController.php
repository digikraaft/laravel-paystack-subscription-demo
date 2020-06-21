<?php

namespace App\Http\Controllers;

use Digikraaft\Paystack\Paystack;
use Digikraaft\Paystack\Plan;
use Digikraaft\PaystackSubscription\Exceptions\PaymentFailure;
use Digikraaft\PaystackSubscription\Payment;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** show view that displays available subscriptions */
    public function showBillingPlans()
    {
        Paystack::setApiKey(env('PAYSTACK_SECRET'));
        $plans = Plan::list()->data;

        return view('billing_plans', compact('plans'));
    }

    /**
     *
     * @throws \Digikraaft\PaystackSubscription\Exceptions\PaymentFailure
     */
    public function handlePaystackPostCallBack()
    {
        // get transaction reference returned by Paystack
        $transactionRef = request()->input('reference');

        //verify the transaction is valid
        $transaction = Payment::hasValidTransaction($transactionRef);

        if ($transaction) {
            // create subscription for logged in user
            auth()->user()
                ->newSubscription('default', $transaction->data->plan)
                ->create($transaction->data->id);

            return redirect()->route('home');
        }

        throw PaymentFailure::incompleteTransaction($transaction);
    }

    /**
     * Cancel the subscription at the end of the current billing period
     */
    public function cancel()
    {
        auth()->user()
            ->subscription()
            ->cancel();

        return redirect('home');
    }

    /**
     * Restart a canceled subscription
     */
    public function restart()
    {
        auth()->user()
            ->subscription()
            ->enable();

        return redirect('home');
    }
}

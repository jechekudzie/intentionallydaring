<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Paynow\Payments\Paynow;

class PaymentsController extends Controller
{
    //
    public function initiatePayment(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'totalAmount' => 'required',
            'currentCurrency' => 'required',
            'description' => 'required',
            'tickets' => 'required|integer|min:1',
        ]);


        $orderData = $validatedData;

        //generate unique reference
        $orderData['reference'] = 'INV' . strtoupper(uniqid());

        // Initiate the payment and redirect the user
        $payNow = $this->payNow();

        // Create a new payment
        $payment = $payNow->createPayment($orderData['reference'], 'nigel@leadingdigital.africa');

        // Add items to the payment
        $payment->add('Tickets', $orderData['totalAmount']);

        // Set the payment to be paid using payment methods
        $response = $payNow->send($payment);

        if ($response->success()) {
            $pollUrl = $response->pollUrl();

            //add pollUrl to the orderData
            $orderData['pollUrl'] = $pollUrl;

            // Store the data in the session
            session([
                'orderData' => $orderData
            ]);

            return redirect($response->redirectUrl());
        } else {
            throw new Exception('Failed to initiate payment');
        }


    }

    //checkPayment

    public function checkPayment(Request $request)
    {
        $payNow = $this->payNow();

        //check session if not empty
        if (session()->has('orderData')) {
            $orderData = session('orderData');
        }

        $response = $payNow->pollTransaction($orderData['pollUrl']);
        $status = $response->status();
        $payNowReference = $response->paynowReference();
        $reference = $response->reference();

        if ($status->paid() || $status->awaitingDelivery() || $status->delivered() || $status->awaitingConfirmation() || $status->confirmed()) {
            // Payment has been paid
            // Get the order data from the session
            $orderData = session('orderData');

            // Clear the session
            session()->forget('orderData');

            // Return a success response
            return view('payments.success', compact('orderData'));

        } else {
            // Payment has not been paid
            // Return a failed response
            return view('payments.failed');
        }
    }


    public function payNow()
    {
        $payNow = new Paynow(
            env('PAYNOW_INTEGRATION_ID'),
            env('PAYNOW_INTEGRATION_KEY'),
            'http://localhost:8000/paynow/return',
            'http://localhost:8000/paynow/notify'
        );

        return $payNow;

    }
}

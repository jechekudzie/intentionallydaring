<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Event;
use App\Models\Payment;
use App\Models\Reference;
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

        $customer = Customer::where('email', $orderData['email'])->orWhere('mobile', $orderData['mobile'])->first();

        if ($customer == null) {

            $customer = Customer::create([
                'name' => $orderData['name'],
                'email' => $orderData['email'],
                'mobile' => $orderData['mobile'],
            ]);

        }

        // Initiate the payment and redirect the user
        $payNow = $this->payNow($orderData['currentCurrency'],$orderData['reference']);

        // Create a new payment
        $payment = $payNow->createPayment($orderData['reference'], $orderData['email']);

        // Add items to the payment
        $payment->add('Tickets', $orderData['totalAmount']);

        // Set the payment to be paid using payment methods
        $response = $payNow->send($payment);

        if ($response->success()) {
            $pollUrl = $response->pollUrl();

            $payment = $customer->payments()->create([
                'event_id' => 1,
                'currency' => $orderData['currentCurrency'],
                'total_amount' => $orderData['totalAmount'],
                'number_of_tickets' => $orderData['tickets'],
                'payment_method' => 'paynow',
                'status' => 'pending',
                'reference' => $orderData['reference'],
                'pollUrl' => $pollUrl,
                'payment_date' => now(),

            ]);

            return redirect($response->redirectUrl());
        } else {
            throw new Exception('Failed to initiate payment');
        }


    }

    //checkPayment
    public function checkPayment($reference)
    {

       $payment = Payment::where('reference',$reference)->first();

        $payNow = $this->payNow($payment->currency,$reference);

        $response = $payNow->pollTransaction($payment->pollUrl);
        $status = $response->status();
        $payNowReference = $response->paynowReference();
        $reference = $response->reference();

        $number_of_tickets = $payment->number_of_tickets;

        if ($status == 'paid' || $status == 'awaitingDelivery' || $status == 'delivered') {
            // Payment has been paid
            // Get the order data from the session

            $event = Event::find($payment->event_id);

            // Assuming $numberOfTicketsBought holds the number of tickets the user has bought
            $tickets = $event->tickets()
                ->whereNull('payment_id') // Select tickets where payment_id is null
                ->where('is_hard_copy', 0) // and is_hard_copy is equal to 2
                ->take($number_of_tickets) // Take only the number of tickets the user has bought
                ->get(); // Retrieve the collection

            foreach ($tickets as $ticket) {
                $ticket->update([
                    'payment_id' => $payment->id
                ]);
            }

            $payment->update([
                'status' => $status,
                'paynowreference' => $payNowReference
            ]);

            // Return a success response

            return  redirect('/igc/'.$payment->reference);


        } else {
            // Payment has not been paid
            // Return a failed response
            return  redirect('/igc');
        }
    }

    public function orderDetails($reference)
    {
        $payment  = Payment::where('reference',$reference)->first();
        $customer = $payment->customer;

        $phoneNumber = '+17692786822'; // Your phone number in international format without '+'
        $baseURL = 'https://wa.me/' . $phoneNumber;
        $orderDetailsURL = 'https://intentionallydaring.com/igc/' . $payment->reference;
        $locationURL = 'https://maps.app.goo.gl/gfQPXUWQNaUaNRPY6';

        // Updated message text
        $message = "Welcome to In Good Company, thank you for your purchase. Here is your order link: {$orderDetailsURL} and location to The Vanilla Moon: {$locationURL}";

        $whatsAppLink = $baseURL . '?text=' . urlencode($message);

        $tickets = $payment->tickets;

        return view('confirmation',compact('payment','tickets','whatsAppLink','customer'));

    }

    public function payNow($currency,$reference)
    {

        //zwl

        if($currency == 'USD')
        {
            $payNow = new Paynow(
                '5771',
                '2e958d52-a3f9-4b6b-b845-2654a21a7458',
                'http://intentionallydaring.com/paynow/return/'.$reference,
                'http://intentionallydaring.com/paynow/return/'.$reference
            );
        }else{
            //ZWL
            $payNow = new Paynow(
                '12037',
                'a2efd937-56ae-49c1-bc94-6f236cd3c902',
                'http://intentionallydaring.com/paynow/return/'.$reference,
                'http://intentionallydaring.com/paynow/return/'.$reference
            );

        }

       /* $payNow = new Paynow(
            '5865',
            '23962222-9610-4f7c-bbd5-7e12f19cdfc6',
            'http://intentionallydaring.com/paynow/return',
            'http://intentionallydaring.com/paynow/return'
        );*/

        return $payNow;

    }
}

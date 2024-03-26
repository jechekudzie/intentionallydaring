<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:subscriptions,email', // Change 'subscribers' to your actual table name
        ]);

        // Assuming you have a Subscriber model and 'subscribers' table

      Subscription::create($validatedData);

        return response()->json(['message' => 'Thank you for subscribing!']);
    }

}

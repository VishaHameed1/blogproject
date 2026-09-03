<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        try {
            Subscriber::create([
                'email' => $validated['email'],
                'subscribed_at' => now(),
            ]);

            return redirect()->back()->with('success', 'Subscribed successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to subscribe. Please try again.');
        }
    }
}
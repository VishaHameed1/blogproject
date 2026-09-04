<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PinResetController extends Controller
{
    // 1. Show Email Input Form
    public function showEmailForm()
    {
        return view('auth.forgot-password-pin');
    }

    // 2. Send 6-Digit PIN to Email
    public function sendPin(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $user = User::where('email', $request->email)->first();
        $pin = \round(100000, 999999);

        // Store PIN in password_reset_tokens table (or cache)
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => Hash::make($pin),
                'created_at' => now()
            ]
        );

        // Send Email
        Mail::raw("Aapka password reset PIN code yeh hai: {$pin}", function ($message) use ($request) {
            $message->to($request->email)->subject('Password Reset PIN Code');
        });

        return redirect()->route('password.verify.form', ['email' => $request->email])
            ->with('status', 'A 6-digit PIN has been sent to your email.');
    }

    // 3. Show PIN Verification Form
    public function showVerifyForm(Request $request)
    {
        return view('auth.verify-pin', ['email' => $request->query('email')]);
    }

    // 4. Verify PIN and Login User
    public function verifyPinAndLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'pin' => 'required|numeric|digits:6',
        ]);

        $record = DB::table('password_reset_tokens')->where('email', $request->email)->first();

        if (!$record || !Hash::check($request->pin, $record->token)) {
            return back()->withErrors(['pin' => 'The provided PIN is invalid or has expired.']);
        }

        // PIN is valid, clear token and log user in
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        $user = User::where('email', $request->email)->first();
        Auth::login($user);

        return redirect()->intended('/dashboard');
    }
}

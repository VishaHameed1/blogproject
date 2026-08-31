<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * Allowed roles:
     * - user
     * - author
     *
     * Admin accounts cannot be created through public registration.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        /*
        |--------------------------------------------------------------------------
        | Validate registration data
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class,
            ],

            /*
             * Only these two roles are allowed.
             *
             * "admin" is intentionally NOT included.
             */
            'role' => [
                'required',
                'string',
                'in:user,author',
            ],

            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults(),
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Create user
        |--------------------------------------------------------------------------
        */

        $user = User::create([
            'name' => $validated['name'],

            'email' => $validated['email'],

            'password' => Hash::make(
                $validated['password']
            ),

            /*
             * Store selected role.
             *
             * Possible values:
             * - user
             * - author
             */
            'role' => $validated['role'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Fire Registered event
        |--------------------------------------------------------------------------
        */

        event(new Registered($user));

        /*
        |--------------------------------------------------------------------------
        | Automatically login newly registered user
        |--------------------------------------------------------------------------
        */

        Auth::login($user);

        /*
        |--------------------------------------------------------------------------
        | Redirect based on role
        |--------------------------------------------------------------------------
        */

        if ($user->isAuthor()) {
            return redirect()
                ->route('author.dashboard')
                ->with(
                    'success',
                    'Your author account has been created successfully.'
                );
        }

        /*
         * Normal users go to the main dashboard.
         */
        return redirect()
            ->route('dashboard')
            ->with(
                'success',
                'Your account has been created successfully.'
            );
    }
}
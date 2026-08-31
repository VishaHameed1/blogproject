@extends('layouts.public')

@section('title', 'Verify PIN · chronicle')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-stone-50 text-stone-900 dark:bg-charcoal-950 dark:text-stone-100 transition-colors duration-300 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white dark:bg-charcoal-900 p-8 rounded-2xl border border-stone-200 dark:border-stone-800 shadow-xl">
        
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-rust-600 dark:text-rust-400 mb-2">
                Security Check
            </p>
            <h2 class="font-serif text-3xl font-semibold tracking-tight text-stone-900 dark:text-stone-100">
                Enter 6-Digit PIN
            </h2>
            <p class="mt-2 text-sm text-stone-600 dark:text-stone-400">
                We have sent a verification code to <span class="font-medium text-stone-900 dark:text-stone-200">{{ $email }}</span>. Enter it below to access your account.
            </p>
        </div>

        <form method="POST" action="{{ route('password.verify.login') }}" class="mt-8 space-y-6">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">

            <div>
                <label for="pin" class="block text-sm font-medium text-stone-700 dark:text-stone-300">Verification PIN</label>
                <input id="pin" name="pin" type="text" maxlength="6" placeholder="123456" required autofocus
                    class="mt-1 block w-full px-4 py-3 text-center tracking-widest text-lg font-mono rounded-xl bg-stone-50 dark:bg-charcoal-950 border border-stone-300 dark:border-stone-700 text-stone-900 dark:text-stone-100 focus:outline-none focus:ring-2 focus:ring-rust-600 dark:focus:ring-rust-500">
                
                @error('pin')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-semibold text-white bg-rust-600 hover:bg-rust-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rust-600 transition-all">
                    Verify & Login
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
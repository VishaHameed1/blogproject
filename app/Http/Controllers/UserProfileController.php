<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class UserProfileController extends Controller
{
    /**
     * Display profile page (resources/views/users/profile.blade.php).
     */
    public function index(): View|RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        // Redirect authors directly to author dashboard
        if ($user->isAuthor()) {
            return redirect()->route('author.dashboard');
        }

        // Redirect admins directly to admin dashboard
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        return view('users.profile', [
            'user' => $user,
        ]);
    }

    /**
     * Display edit profile form (resources/views/users/edit.blade.php).
     */
    public function edit(): View|RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        // Redirect authors directly to author dashboard
        if ($user->isAuthor()) {
            return redirect()->route('author.dashboard');
        }

        // Redirect admins directly to admin dashboard
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        return view('users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update basic profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'bio' => [
                'nullable',
                'string',
                'max:500',
            ],

            'avatar' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,webp',
                'max:2048',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Avatar Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('avatar')) {

            // Delete previous avatar
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $validated['avatar'] = $request
                ->file('avatar')
                ->store('avatars', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Update User
        |--------------------------------------------------------------------------
        */

        $user->update($validated);

        return back()->with(
            'status',
            'profile-updated'
        );
    }

    /**
     * Update password.
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $validated = $request->validateWithBag(
            'updatePassword',
            [
                'current_password' => [
                    'required',
                    'current_password',
                ],

                'password' => [
                    'required',
                    Password::defaults(),
                    'confirmed',
                ],
            ]
        );

        $user->update([
            'password' => Hash::make(
                $validated['password']
            ),
        ]);

        return back()->with(
            'status',
            'password-updated'
        );
    }

    /**
     * Toggle save/bookmark post status.
     */
    public function toggleSave(Request $request): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $request->validate([
            'post_id' => ['required', 'exists:posts,id'],
        ]);

        $user->savedPosts()->toggle($request->post_id);

        return back()->with('status', 'post-saved-toggled');
    }

    /**
     * Display list of saved posts.
     */
    public function savedPosts(): View
    {
        /** @var User $user */
        $user = Auth::user();

        $posts = $user->savedPosts()->paginate(10);

        return view('users.saved-posts', [
            'posts' => $posts,
        ]);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        // Delete user's avatar if exists
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
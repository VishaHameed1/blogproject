<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Show the author profile page.
     */
    public function index()
    {
        /** @var User|null $user */
        $user = Auth::user();

        if (!$user) {
            return redirect()
                ->route('login')
                ->with('error', 'Please login first.');
        }

        return view('users.profile', compact('user'));
    }

    /**
     * Update the author profile.
     */
    public function update(Request $request)
    {
        /** @var User|null $user */
        $user = Auth::user();

        if (!$user) {
            return redirect()
                ->route('login')
                ->with('error', 'Please login first.');
        }

        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'bio' => 'nullable|string|max:500',
            'remove_avatar' => 'nullable|boolean',
        ]);

        // Update user information
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->bio = $validated['bio'] ?? null;

        // Remove existing avatar
        if ($request->boolean('remove_avatar') && $user->avatar) {

            if (!filter_var($user->avatar, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $user->avatar = null;
        }

        // Upload new avatar
        elseif ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {

            // Delete old local avatar
            if (
                $user->avatar &&
                !filter_var($user->avatar, FILTER_VALIDATE_URL)
            ) {
                Storage::disk('public')->delete($user->avatar);
            }

            // Store new avatar
            $path = $request->file('avatar')->store('avatars', 'public');

            $user->avatar = $path;
        }

        // Save changes
        $user->save();

        return redirect()
            ->route('author.profile')
            ->with('success', 'Profile updated successfully!');
    }

    /**
     * Delete the authenticated user's profile.
     */
    public function destroy(Request $request)
    {
        /** @var User|null $user */
        $user = Auth::user();

        if (!$user) {
            return redirect()
                ->route('login')
                ->with('error', 'Please login first.');
        }

        // Delete avatar file if it is stored locally
        if (
            $user->avatar &&
            !filter_var($user->avatar, FILTER_VALIDATE_URL)
        ) {
            Storage::disk('public')->delete($user->avatar);
        }

        // Store user ID before logout/delete if needed
        $user->delete();

        // Log out the user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Generate a new CSRF token
        $request->session()->regenerateToken();

        return redirect()
            ->route('home')
            ->with('success', 'Profile deleted successfully.');
    }
}
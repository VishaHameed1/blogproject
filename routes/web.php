<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

// Public Controllers
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

// Author Controllers
use App\Http\Controllers\Author\DashboardController as AuthorDashboardController;
use App\Http\Controllers\Author\AuthorPostController;
use App\Http\Controllers\Author\ProfileController as AuthorProfileController;

use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserActivityController;

use App\Http\Controllers\Auth\PinResetController;
use App\Http\Controllers\NewsletterController;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PostController::class, 'index'])
    ->name('home');

Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index');

Route::get('/search/suggestions', [PostController::class, 'suggestions'])
    ->name('posts.suggestions');

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

Route::get('/category/{category:slug}', [PostController::class, 'byCategory'])
    ->name('posts.category');

Route::get('/about', [AboutController::class, 'index'])
    ->name('about');

Route::get('/contact', [ContactController::class, 'index'])
    ->name('contact');

Route::post('/contact', [ContactController::class, 'send'])
    ->name('contact.send');

Route::get('/blog/{post:slug}', [PostController::class, 'show'])
    ->name('posts.show');


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    /** @var User|null $user */
    $user = Auth::user();

    if (!$user) {
        abort(401);
    }

    /*
    |--------------------------------------------------------------------------
    | Admin
    |--------------------------------------------------------------------------
    */

    if ($user->isAdmin()) {
        return redirect()->route('admin.dashboard');
    }

    /*
    |--------------------------------------------------------------------------
    | Author
    |--------------------------------------------------------------------------
    */

    if ($user->isAuthor()) {
        return redirect()->route('author.dashboard');
    }

    /*
    |--------------------------------------------------------------------------
    | Normal User
    |--------------------------------------------------------------------------
    */

    return view('dashboard');

})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| User / Profile Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Profile & Account Management
    |--------------------------------------------------------------------------
    */
    Route::get('/saved-posts', [UserProfileController::class, 'saved'])
        ->name('users.saved');

    Route::post('/saved-posts', [UserProfileController::class, 'toggleSave'])
        ->name('users.saved.store');

    Route::get('/profile', [UserProfileController::class, 'index'])
        ->name('profile.index');

    Route::get('/profile/edit', [UserProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [UserProfileController::class, 'update'])
        ->name('profile.update');

    Route::put('/profile/password', [UserProfileController::class, 'updatePassword'])
        ->name('password.update');

    /*
    |--------------------------------------------------------------------------
    | Saved Posts & Reading History
    |--------------------------------------------------------------------------
    */
    Route::get('/saved-posts', [UserActivityController::class, 'savedPosts'])
        ->name('users.saved');

    Route::get('/history', [UserActivityController::class, 'history'])
        ->name('users.history');

    Route::delete('/history/clear', [UserActivityController::class, 'clearHistory'])
        ->name('users.history.clear');

    Route::post('/posts/{post}/bookmark', [UserActivityController::class, 'toggleBookmark'])
        ->name('users.bookmark.toggle');
});


/*
|--------------------------------------------------------------------------
| Author Routes
|--------------------------------------------------------------------------
|
| All author routes require authentication.
|
*/

Route::middleware(['auth'])
    ->prefix('author')
    ->name('author.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Author Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/dashboard',
            [AuthorDashboardController::class, 'index']
        )->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | Author Posts
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/posts',
            [AuthorPostController::class, 'index']
        )->name('posts.index');


        /*
        |--------------------------------------------------------------------------
        | Create Post
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/posts/create',
            [AuthorPostController::class, 'create']
        )->name('posts.create');


        /*
        |--------------------------------------------------------------------------
        | Store Post
        |--------------------------------------------------------------------------
        */

        Route::post(
            '/posts',
            [AuthorPostController::class, 'store']
        )->name('posts.store');


        /*
        |--------------------------------------------------------------------------
        | Edit Post
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/posts/{post}/edit',
            [AuthorPostController::class, 'edit']
        )->name('posts.edit');


        /*
        |--------------------------------------------------------------------------
        | Update Post
        |--------------------------------------------------------------------------
        */

        Route::put(
            '/posts/{post}',
            [AuthorPostController::class, 'update']
        )->name('posts.update');


        /*
        |--------------------------------------------------------------------------
        | Submit Post For Admin Review
        |--------------------------------------------------------------------------
        */

        Route::post(
            '/posts/{post}/submit',
            [AuthorPostController::class, 'submitForReview']
        )->name('posts.submit');


        /*
        |--------------------------------------------------------------------------
        | Delete Post
        |--------------------------------------------------------------------------
        */

        Route::delete(
            '/posts/{post}',
            [AuthorPostController::class, 'destroy']
        )->name('posts.destroy');


        /*
        |--------------------------------------------------------------------------
        | Author Profile
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/profile',
            [AuthorProfileController::class, 'index']
        )->name('profile');

        Route::put(
            '/profile',
            [AuthorProfileController::class, 'update']
        )->name('profile.update');
    });


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| All admin routes require authentication.
|
*/

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Admin Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/',
            [AdminDashboardController::class, 'index']
        )->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | Post Management
        |--------------------------------------------------------------------------
        */

        // Posts list
        Route::get(
            '/posts',
            [AdminPostController::class, 'index']
        )->name('posts.index');


        // Create post form
        Route::get(
            '/posts/create',
            [AdminPostController::class, 'create']
        )->name('posts.create');


        // Store new post
        Route::post(
            '/posts',
            [AdminPostController::class, 'store']
        )->name('posts.store');


        // Edit post form
        Route::get(
            '/posts/{post}/edit',
            [AdminPostController::class, 'edit']
        )->name('posts.edit');


        // Update post
        Route::put(
            '/posts/{post}',
            [AdminPostController::class, 'update']
        )->name('posts.update');


        // Delete post
        Route::delete(
            '/posts/{post}',
            [AdminPostController::class, 'destroy']
        )->name('posts.destroy');


        // Toggle publish status
        Route::patch(
            '/posts/{post}/toggle-publish',
            [AdminPostController::class, 'togglePublish']
        )->name('posts.toggle-publish');


        /*
        |--------------------------------------------------------------------------
        | Category Management
        |--------------------------------------------------------------------------
        */

        // Categories list
        Route::get(
            '/categories',
            [AdminCategoryController::class, 'index']
        )->name('categories.index');


        // Create category form
        Route::get(
            '/categories/create',
            [AdminCategoryController::class, 'create']
        )->name('categories.create');


        // Store category
        Route::post(
            '/categories',
            [AdminCategoryController::class, 'store']
        )->name('categories.store');


        // Edit category
        Route::get(
            '/categories/{category}/edit',
            [AdminCategoryController::class, 'edit']
        )->name('categories.edit');


        // Update category
        Route::put(
            '/categories/{category}',
            [AdminCategoryController::class, 'update']
        )->name('categories.update');


        // Delete category
        Route::delete(
            '/categories/{category}',
            [AdminCategoryController::class, 'destroy']
        )->name('categories.destroy');


        /*
        |--------------------------------------------------------------------------
        | User Management
        |--------------------------------------------------------------------------
        */

        // Users list
        Route::get(
            '/users',
            [AdminUserController::class, 'index']
        )->name('users.index');


        // Create user form
        Route::get(
            '/users/create',
            [AdminUserController::class, 'create']
        )->name('users.create');


        // Store user
        Route::post(
            '/users',
            [AdminUserController::class, 'store']
        )->name('users.store');


        // Edit user
        Route::get(
            '/users/{user}/edit',
            [AdminUserController::class, 'edit']
        )->name('users.edit');


        // Update user
        Route::put(
            '/users/{user}',
            [AdminUserController::class, 'update']
        )->name('users.update');


        // Delete user
        Route::delete(
            '/users/{user}',
            [AdminUserController::class, 'destroy']
        )->name('users.destroy');
    });


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('forgot-password-pin', [PinResetController::class, 'showEmailForm'])->name('password.request.pin');
Route::post('forgot-password-pin', [PinResetController::class, 'sendPin'])->name('password.email.pin');
Route::get('verify-pin', [PinResetController::class, 'showVerifyForm'])->name('password.verify.form');
Route::post('verify-pin-login', [PinResetController::class, 'verifyPinAndLogin'])->name('password.verify.login');

/*
|--------------------------------------------------------------------------
| Newsletter Routes
|--------------------------------------------------------------------------
*/
Route::post('/newsletter/subscribe', [App\Http\Controllers\NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

require __DIR__ . '/auth.php';
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BlogController;
use App\Models\User;
use App\Models\Project;
use App\Models\Client;
use App\Models\Service;
use App\Models\Article;
use App\Models\Contact;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Landing Page Routes
Route::get('/', function () {
    return view('landing.home');
});

Route::get('/about', function () {
    return view('landing.about');
});

Route::get('/service', function () {
    return view('landing.service');
});

Route::get('/service/{slug}', function ($slug) {
    $service = \App\Models\Service::where('slug', $slug)->firstOrFail();
    return view('landing.service-detail', compact('service'));
});

Route::get('/contact', function () {
    return view('landing.contact');
});
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');

Route::get('/pricing', function () {
    return view('landing.pricing');
});

Route::get('/clients', function () {
    return view('landing.clients');
});

Route::get('/project-4-col', function () {
    return view('landing.project-4-col');
});

Route::get('/project-3-col', function () {
    return view('landing.project-4-col'); // Same as 4-col for now
});

Route::get('/project-details', function () {
    return view('landing.project-4-col'); // Same as 4-col for now
});

Route::get('/mission', function () {
    return view('landing.about'); // Similar to about for now
});

Route::get('/company-service', function () {
    return view('landing.service'); // Similar to service for now
});

Route::get('/faq', function () {
    return view('landing.pricing'); // Similar layout for now
});

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Comment Routes
Route::post('/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');


// Dashboard (hanya bisa diakses setelah login)
Route::get('/dashboard', function () {
    $totalUsers = User::count();
    $totalProjects = Project::count();
    $totalClients = Client::count();
    $totalArticles = Article::count();
    $recentContacts = Contact::latest()->take(5)->get();
    $recentProjects = Project::latest()->take(5)->get();
    $recentArticles = Article::latest()->take(5)->get();
    $services = Service::all();

    return view('dashboard.index', compact(
        'totalUsers',
        'totalProjects',
        'totalClients',
        'totalArticles',
        'recentContacts',
        'recentProjects',
        'recentArticles',
        'services'
    ));
})->middleware('auth')->name('dashboard');

// Dashboard Routes dengan prefix 'dashboard' (hanya bisa diakses setelah login)
Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('kategoris', KategoriController::class);
    Route::resource('sliders', \App\Http\Controllers\SliderController::class);
});

<?php

use App\Models\Category;
use App\Models\Discipline;
use App\Models\Event;
use App\Models\Facility;
use App\Models\Hero;
use App\Models\Membership;
use App\Models\PageSection;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $hero = Hero::where('is_active', true)->orderBy('sort_order')->first();
    $disciplines = Discipline::with('images')->where('is_published', true)->orderBy('sort_order')->get();
    $facilities = Facility::with('images')->where('is_published', true)->orderBy('sort_order')->get();
    $pageSections = PageSection::where('is_active', true)->get()->keyBy('key');
    $events = Event::where('is_published', true)->orderBy('created_at', 'desc')->take(6)->get();

    return view('welcome', compact('hero', 'disciplines', 'facilities', 'pageSections', 'events'));
});

Route::get('/eventos', function () {
    $events = Event::where('is_published', true)->orderBy('created_at', 'desc')->get();
    return view('eventos', compact('events'));
})->name('eventos.index');

Route::get('/eventos/{slug}', function ($slug) {
    $event = Event::where('slug', $slug)->where('is_published', true)->firstOrFail();
    return view('eventos.show', compact('event'));
})->name('eventos.show');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/lector', function () {
    $categories = Category::where('is_visible', true)->get();
    return view('lector.index', compact('categories'));
});

Route::get('/lector-pdf', function () {
    $category = Category::where('slug', request('category'))->where('is_visible', true)->firstOrFail();
    return view('lector.pdf_viewer', compact('category'));
});

Route::get('/instalaciones', function () {
    $facilities = Facility::with('images')->where('is_published', true)->orderBy('sort_order')->get();
    return view('instalaciones', compact('facilities'));
});

Route::get('/instalaciones/{slug}', function ($slug) {
    $area = Facility::with('images')->where('slug', $slug)->where('is_published', true)->firstOrFail();
    return view('instalaciones.show', compact('area'));
});

Route::get('/clases', function () {
    $disciplines = Discipline::with('images')->where('is_published', true)->orderBy('sort_order')->get();
    return view('clases', compact('disciplines'));
});

Route::get('/nosotros', function () {
    $pageSections = \App\Models\PageSection::where('is_active', true)->get()->keyBy('key');
    return view('nosotros', compact('pageSections'));
});

Route::get('/clases/{slug}', function ($slug) {
    $area = Discipline::with('images')->where('slug', $slug)->where('is_published', true)->firstOrFail();
    return view('clases.show', compact('area'));
});

Route::get('/membresias', function () {
    $memberships = Membership::where('is_published', true)->orderBy('sort_order')->with('benefits')->get();
    return view('membresias', compact('memberships'));
});

require __DIR__.'/auth.php';

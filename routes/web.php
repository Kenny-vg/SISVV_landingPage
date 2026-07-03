<?php

use App\Models\Discipline;
use App\Models\Facility;
use App\Models\Hero;
use App\Models\PageSection;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $hero = Hero::where('is_active', true)->orderBy('sort_order')->first();
    $disciplines = Discipline::where('is_published', true)->orderBy('sort_order')->get();
    $facilities = Facility::where('is_published', true)->orderBy('sort_order')->get();
    $pageSections = PageSection::where('is_active', true)->get()->keyBy('key');

    return view('welcome', compact('hero', 'disciplines', 'facilities', 'pageSections'));
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/lector', function () {
    return view('lector.index');
});

Route::get('/lector-pdf', function () {
    return view('lector.pdf_viewer');
});

Route::get('/instalaciones', function () {
    $facilities = Facility::where('is_published', true)->orderBy('sort_order')->get();
    return view('instalaciones', compact('facilities'));
});

Route::get('/instalaciones/{slug}', function ($slug) {
    $area = Facility::where('slug', $slug)->where('is_published', true)->firstOrFail();
    return view('instalaciones.show', compact('area'));
});

Route::get('/clases', function () {
    $disciplines = Discipline::where('is_published', true)->orderBy('sort_order')->get();
    return view('clases', compact('disciplines'));
});

Route::get('/clases/{slug}', function ($slug) {
    $area = Discipline::where('slug', $slug)->where('is_published', true)->firstOrFail();
    return view('clases.show', compact('area'));
});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'static.pages.home')->name('home');
Route::view('about', 'static.pages.about')->name('about');
Route::view('pricing', 'static.pages.pricing')->name('pricing');
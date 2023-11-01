<?php

use Illuminate\Support\Facades\Route;
use Sixincode\HiveCommunity\Http\Controllers\Central as Controllers;

Route::middleware(
  config('hive-community-middlewares.central', ['web']),
)
->name('central.')
->group(function () {
   Route::get('/',  [Controllers\LandingController::class, 'mainLanding'])->name('landing');

   Route::get('/about',    [Controllers\AboutController::class, 'mainAbout'])->name('about');
   Route::get('/contact',  [Controllers\ContactController::class, 'mainContact'])->name('contact');
   Route::get('/blog',    [Controllers\BlogController::class, 'mainBlog'])->name('blog');

});

<?php

use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Website\WebsiteController;
use App\Http\Controllers\Subscriber\SubscriberController;
use Illuminate\Support\Facades\Route;

Route::prefix('website')->as('website.')->group(function() {
    Route::post('store', [WebsiteController::class, 'store'])->name('store');
});

Route::prefix('subscriber')->as('subscriber.')->group(function() {
    Route::post('store', [SubscriberController::class, 'store'])->name('store');
});

Route::prefix('post')->as('post.')->group(function() {
    Route::post('store', [PostController::class, 'store'])->name('store');
});

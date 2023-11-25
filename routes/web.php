<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;

Route::get('/ping', function() {
    $mailchimp = new \MailchimpMarketing\ApiClient();
    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us8'
    ]);

    $response = $mailchimp->lists->addListMember('67230ec592', [
        'email_address' => 'gm1wkr+1@gmail.com',
        'status' => 'subscribed',
    ]);
    ddd($response);
});

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/post/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');

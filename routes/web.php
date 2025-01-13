<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', ['name' => 'Mustafa']);
});

Route::get('/hello', function () {
    return 'hello route';
});

Route::get('/greet/{name}', function ($name) { return 'Hello ' . $name . '!'; })->name('greet');

Route::fallback(function () {
    return '<h1 class="text-center">Not found</h1>';
});

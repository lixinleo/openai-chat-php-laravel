<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('mychat.index');
});

Route::get('/mychat', function () {
    return "hello world 2";
})->name("mychat.index");

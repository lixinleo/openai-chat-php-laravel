<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('mychat.index');
});

Route::get('/mychat', function () {
    return view('index');
})->name("mychat.index");

Route::post("/mychat", function (Request $request) {
    dd($request->all());
})->name("mychat.post");

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return response()->json(['message' => 'Thank you for using Laravel template for building Kebapp.php :)']);
    return response()->json(['message' => 'Hello from github action again!']);
});

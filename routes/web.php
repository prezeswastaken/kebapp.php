<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return response()->json(['message' => 'Thank you for using Laravel template for building Kebapp.php :)']);
    return response()->json(['message' => 'Hello from github action again!']);
});

Route::get('/docs', function () {
    return redirect()->to('https://documenter.getpostman.com/view/29357733/2sAXxMftGJ#get-started-here');
});

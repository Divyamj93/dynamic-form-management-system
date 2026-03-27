<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/users', function () {
    return response()->json([
        'status' => true,
        'data' => User::paginate(10)
    ]);
});
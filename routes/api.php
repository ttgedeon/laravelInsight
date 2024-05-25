<?php

use App\Http\Controllers\AccountConttroller;
use App\Http\Controllers\UserConttroller;
use App\Http\Controllers\Auth\RegisteredUser;

Route::post("register", RegisteredUser::class);

Route::middleware("auth:sanctum")->group(function () {
    Route::apiResource("users", UserConttroller::class);
    Route::apiResource("accounts", AccountConttroller::class);
});
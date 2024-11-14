<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);

Route::group(['middleware' => ['auth:api']], function () {
    Route::group([
        'as' => 'auth.',
        'prefix' => 'auth',
        'controller' => AuthController::class
    ],
    static function () {
        Route::post('/logout', 'logout');
        Route::post('/refresh', 'refresh');
        Route::post('/me', 'me');
        }
    );

    Route::group([
            'as' => 'task.',
            'prefix' => 'task',
            'controller' => TaskController::class
        ],
        static function () {
            Route::get('/', 'index');
            Route::get('/{id}', 'show');
            Route::post('/', 'store');
            Route::put('/{id}', 'update');
            Route::delete('/{id}', 'destroy');
        }
    );
});


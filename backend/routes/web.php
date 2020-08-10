<?php

use Illuminate\Support\Facades\Route;
use App\Mail\NewPasswordConfirmation;

Route::get('/{any}', 'ApplicationController@index')
    ->where('any', '^(?!profile/confirmation/.*?$).*');

Route::get('/profile/confirmation/{user}', 'ConfirmationsController@confirmEmailChange')
    ->name(NewPasswordConfirmation::CONFIRMATION_ROUTE_NAME);

<?php

use App\Providers\AppServiceProvider;
use Tymon\JWTAuth\Providers\LaravelServiceProvider as JWTServiceProvider;

return [
    AppServiceProvider::class,
    JWTServiceProvider::class,
];

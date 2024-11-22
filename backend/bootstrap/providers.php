<?php

return [
    App\Providers\AppServiceProvider::class,
    Tymon\JWTAuth\Providers\LaravelServiceProvider::class,
    Modules\Profile\Buyer\Services\Providers\BuyerServiceProvider::class
];

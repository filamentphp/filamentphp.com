<?php

namespace App\Services;

use Stripe\StripeClient;

class StripeService
{
    public static function make(): StripeClient
    {
        return app('stripe');
    }
}

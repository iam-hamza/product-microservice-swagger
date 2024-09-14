<?php

return [
    'secret' => env('STRIPE_SECRET'),
    'key' => env('STRIPE_KEY'),
    'webhook' => env('STRIPE_WEBHOOK_SECRET'),
];
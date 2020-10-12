<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

trait HttpClientService
{
    public function fetchPrice($symbol)
    {
        return json_decode(Http::get(env('IEX_CLOUD_URL')."stock/{$symbol}/quote/latestPrice?token=".env('IEX_CLOUD_KEY')));
    }
}

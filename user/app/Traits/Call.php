<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait Call
{

    public function sendPost($url, $data = [])
    {
        return Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post($url, $data);
    }

    public function sendGet($url, $data = [])
    {
        return Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->get($url);

    }
}

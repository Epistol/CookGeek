<?php

namespace App\Http\Middleware;

use Fideloper\Proxy\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array
     */
    protected $proxies
        = [
            '147.135.192.243',
            '127.0.0.1',
        ];

    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}

<?php

namespace HenriqueRamos\Cloudflare;

use Closure;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\ServerBag;

use RequesterIPAddress;

class Middleware
{
    /**
     * Handle the request and insert the Cloudflare Requester IP
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $requesterData = new RequesterIPAddress($request);

        if ($requesterData->isCloudFlareRequest()) {
            $serverParams = $request->server->all();
            $serverParams['ORIGINAL_REMOTE_ADDR'] = $request->ips();
            $serverParams['REMOTE_ADDR'] = $requesterData->ip();

            $request->server = new ServerBag($serverParams);
        }

        return $next($request);
    }
}

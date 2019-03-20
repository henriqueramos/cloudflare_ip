<?php

namespace HenriqueRamos\Cloudflare;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\IpUtils;

class RequesterIPAddress
{
    /**
     * Cloudflare's IPs list.
     * @see https://www.cloudflare.com/ips/
     *
     * @var string[]
     */
    protected $cloudflareIPs = [
        '103.21.244.0/22',
        '103.22.200.0/22',
        '103.31.4.0/22',
        '104.16.0.0/12',
        '108.162.192.0/18',
        '131.0.72.0/22',
        '141.101.64.0/18',
        '162.158.0.0/15',
        '172.64.0.0/13',
        '173.245.48.0/20',
        '188.114.96.0/20',
        '190.93.240.0/20',
        '197.234.240.0/22',
        '198.41.128.0/17',
        '2400:cb00::/32',
        '2405:8100::/32',
        '2405:b500::/32',
        '2606:4700::/32',
        '2803:f800::/32',
        '2a06:98c0::/29',
        '2c0f:f248::/32',
    ];

    /**
     * @var Request $request
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Checks if current request is coming from CloudFlare servers.
     *
     * @return bool
     */
    public function isCloudFlareRequest(): bool
    {
        return IpUtils::checkIp(
            $this->request->ip(),
            $this->cloudflareIPs
        );
    }

    /**
     * Retrives the requester IP address from the current request
     *
     * @return string
     */
    public function ip(): string
    {
        if (!$this->isCloudFlareRequest()) {
            return $this->request->ip();
        }

        $connectingIp = $this->request->header('CF_CONNECTING_IP');
        $sanitizedIP = filter_var($connectingIp, FILTER_VALIDATE_IP);

        if ($sanitizedIP === false) {
            return $this->request->ip();
        }

        return $sanitizedIP;
    }
}

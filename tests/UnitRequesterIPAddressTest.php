<?php

namespace HenriqueRamos\Cloudflare\Tests;

use HenriqueRamos\Cloudflare\RequesterIPAddress;

class UnitRequesterIPAddressTest extends TestCase
{
    public function testIPAddressUnderCloudflare(): void
    {
        $userIP = '198.51.100.24';
        $cloudflareIP = '108.162.192.76';
        $headers = [
            'HTTP_CF_CONNECTING_IP' => $userIP,
            'REMOTE_ADDR' => $cloudflareIP,
        ];

        $requester = new RequesterIPAddress(
            $this->createRequest($headers)
        );

        $this->assertTrue(
            $requester->isCloudFlareRequest()
        );

        $this->assertEquals(
            $userIP,
            $requester->ip()
        );
    }
}

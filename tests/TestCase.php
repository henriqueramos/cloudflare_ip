<?php

namespace HenriqueRamos\Cloudflare\Tests;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function createRequest(
        array $server = ['CONTENT_TYPE' => 'application/json']
    ): SymfonyRequest {
        $request = new Request();
        return $request->createFromBase(
            SymfonyRequest::create(
                '/',
                'GET',
                [],
                [],
                [],
                $server,
                ''
            )
        );
    }
}

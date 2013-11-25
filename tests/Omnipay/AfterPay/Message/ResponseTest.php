<?php

namespace Omnipay\AfterPay\Message;

use Mockery as m;
use Omnipay\TestCase;

class ResponseTest extends TestCase
{
    public function testPurchaseSuccess()
    {
        $httpResponse = $this->getMockHttpResponse('PurchaseSuccess.txt');
        $response = new Response($this->getMockRequest(), $httpResponse->getBody());

        $this->assertTrue($response->isSuccessful());
        $this->assertEquals('74035', $response->getTransactionReference());
        $this->assertEmpty($response->getMessage());
    }

    public function testPurchaseFailure()
    {
        $httpResponse = $this->getMockHttpResponse('PurchaseFailure.txt');
        $response = new Response($this->getMockRequest(), $httpResponse->getBody());

        $this->assertFalse($response->isSuccessful());
        $this->assertSame('', $response->getTransactionReference());
        $this->assertSame('field.ordernumber.exists (fieldname : ordernummer)', $response->getMessage());
    }
}

<?php

namespace Omnipay\AfterPay;

use Omnipay\Common\CreditCard;
use Omnipay\GatewayTestCase;

class GatewayTest extends GatewayTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());

        $this->gateway->setMerchantId('123');
        $this->gateway->setPassword('123');
        $this->gateway->setPortfolioId('1');
        $this->gateway->setTestMode(true);

        $this->options = array(

            'amount' => '10.00',
            'currency' => 'EUR',
            'transactionId' => '123',

            'card' => new CreditCard(array(
                'address1' => '19',
                'address2' => 'Teststraat',
                'city' => 'Amsterdam',
                'country' => 'NL',
                'email' => 'john@example.com',
                'firstName' => 'John',
                'lastName' => 'Smith',
                'number' => '912367288',
                'phone' => '+31206370705',
                'postcode' => '1012XM',
                'birthday' => '1985-01-24T06:00:00',
                'gender' => 'M'
            )),
        );
    }

    public function testPurchase()
    {
        $this->setMockHttpResponse('PurchaseSuccess.txt');

        $response = $this->gateway->purchase($this->options)->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
    }
}

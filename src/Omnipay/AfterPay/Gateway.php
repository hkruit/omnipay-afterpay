<?php

namespace Omnipay\AfterPay;

use Omnipay\AfterPay\Message\PurchaseRequest;
use Omnipay\Common\AbstractGateway;

/**
 * AfterPay Gateway
 *
 * @link http://
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'AfterPay';
    }

    public function getDefaultParameters()
    {
        return array(
            'merchantId' => '',
            'password' => '',
            'portfolioId' => '',
            'testMode' => false,
        );
    }

    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }

    public function getPassword()
    {
        return $this->getParameter('password');
    }

    public function setPassword($value)
    {
        return $this->setParameter('password', $value);
    }

    public function getPortfolioId()
    {
        return $this->getParameter('portfolioId');
    }

    public function setPortfolioId($value)
    {
        return $this->setParameter('portfolioId', $value);
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\AfterPay\Message\PurchaseRequest', $parameters);
    }
}

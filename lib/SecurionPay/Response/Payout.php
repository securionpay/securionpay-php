<?php
namespace SecurionPay\Response;

class Payout extends AbstractResponse
{

    public function __construct($response)
    {
        parent::__construct($response);
    }

    public function getId()
    {
        return $this->get('id');
    }

    public function getCreated()
    {
        return $this->get('created');
    }

    public function getAmount()
    {
        return $this->get('amount');
    }
    
    public function getCurrency()
    {
        return $this->get('currency');
    }

    public function getPeriodStart()
    {
        return $this->get('periodStart');
    }
    
    public function getPeriodEnd()
    {
        return $this->get('periodEnd');
    }
}

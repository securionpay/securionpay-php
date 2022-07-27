<?php
namespace SecurionPay\Response;

class PayoutTransaction extends AbstractResponse
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

    public function getType()
    {
        return $this->get('type');
    }
    
    public function getAmount()
    {
        return $this->get('amount');
    }
    
    public function getCurrency()
    {
        return $this->get('currency');
    }

    public function getDescription()
    {
        return $this->get('description');
    }
    
    public function getFee()
    {
        return $this->get('fee');
    }
    
    public function getSource()
    {
        return $this->get('source');
    }
    
    public function getPayout()
    {
        return $this->get('payout');
    }
    
    public function getExchangeRate()
    {
        return $this->get('exchangeRate');
    }
}

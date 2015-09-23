<?php
namespace SecurionPay\Response;

class CustomerRecord extends AbstractResponse
{

    public function __construct($response)
    {
        parent::__construct($response);
    }

    public function getId()
    {
        return $this->get('id');
    }

    public function getEmail()
    {
        return $this->get('email');
    }

    public function getCreated()
    {
        return $this->get('created');
    }

    public function getUpdated()
    {
        return $this->get('updated');
    }

    public function getSubscription()
    {
        return $this->get('subscription');
    }

    public function getLatest()
    {
        return $this->get('latest');
    }

    public function getVolume()
    {
        return $this->get('volume');
    }

    public function getCurrency()
    {
        return $this->get('currency');
    }

    public function getChargesCount()
    {
        return $this->get('chargesCount');
    }

    public function getRefundsCount()
    {
        return $this->get('refundsCount');
    }

    public function getChargebacksCount()
    {
        return $this->get('chargebacksCount');
    }

    public function getVerifiedPhone()
    {
        return $this->get('verifiedPhone');
    }
}

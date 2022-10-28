<?php

namespace SecurionPay\Response;

class PaymentMethod extends AbstractResponse
{

    public function __construct($response)
    {
        parent::__construct($response);
    }

    public function getId()
    {
        return $this->get('id');
    }

    public function getCustomerId()
    {
        return $this->get('customerId');
    }

    public function getClientObjectId()
    {
        return $this->get('clientObjectId');
    }

    public function getCreated()
    {
        return $this->get('created');
    }

    public function getType()
    {
        return $this->get('type');
    }

    public function getStatus()
    {
        return $this->get('status');
    }

    public function getDeleted()
    {
        return $this->get('deleted', false);
    }

    /**
     * @return \SecurionPay\Response\Billing
     */
    public function getBilling()
    {
        return $this->getObject('billing', '\SecurionPay\Response\Billing');
    }

    /**
     * @return \SecurionPay\Response\FraudCheckData
     */
    public function getFraudCheckData()
    {
        return $this->getObject('fraudCheckData', '\SecurionPay\Response\FraudCheckData');
    }
}

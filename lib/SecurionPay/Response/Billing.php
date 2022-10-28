<?php
namespace SecurionPay\Response;

class Billing extends AbstractResponse
{

    public function __construct($response)
    {
        parent::__construct($response);
    }

    public function getName()
    {
        return $this->get('name');
    }

    /**
     * @return \SecurionPay\Response\Address
     */
    public function getAddress()
    {
        return $this->getObject('address', '\SecurionPay\Response\Address');
    }

    public function getVat()
    {
        return $this->get('vat');
    }

    public function getEmail()
    {
        return $this->get('email');
    }
}

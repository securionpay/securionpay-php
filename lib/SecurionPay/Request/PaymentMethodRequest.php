<?php
namespace SecurionPay\Request;

class PaymentMethodRequest extends AbstractRequest
{

    public function getId()
    {
        return $this->get('id');
    }

    public function id($id)
    {
        return $this->set('id', $id);
    }

    public function getCustomerId()
    {
        return $this->get('customerId');
    }

    public function customerId($customerId)
    {
        return $this->set('customerId', $customerId);
    }

    public function getType()
    {
        return $this->get('type');
    }

    public function type($type)
    {
        return $this->set('type', $type);
    }

    /**
     * @return \SecurionPay\Request\BillingRequest
     */
    public function getBilling()
    {
        return $this->getObject('billing', '\SecurionPay\Request\BillingRequest');
    }

    public function billing($billing)
    {
        return $this->set('billing', $billing);
    }
}

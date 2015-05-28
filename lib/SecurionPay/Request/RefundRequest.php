<?php
namespace SecurionPay\Request;

class RefundRequest extends AbstractRequest
{

    public function getChargeId()
    {
        return $this->get('chargeId');
    }

    public function chargeId($chargeId)
    {
        return $this->set('chargeId', $chargeId);
    }

    public function getAmount()
    {
        return $this->get('amount');
    }

    public function amount($amount)
    {
        return $this->set('amount', $amount);
    }
}

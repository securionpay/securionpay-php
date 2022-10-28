<?php
namespace SecurionPay\Request;

class ChargeFlowRequest extends AbstractRequest
{

    public function getReturnUrl()
    {
        return $this->get('returnUrl');
    }

    public function returnUrl($returnUrl)
    {
        return $this->set('returnUrl', $returnUrl);
    }
}

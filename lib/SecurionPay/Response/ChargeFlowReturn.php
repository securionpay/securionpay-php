<?php
namespace SecurionPay\Response;

class ChargeFlowReturn extends AbstractResponse
{

    public function __construct($response)
    {
        parent::__construct($response);
    }

    public function getRedirectUrl()
    {
        return $this->get('redirectUrl');
    }
}

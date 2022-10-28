<?php
namespace SecurionPay\Response;

class ChargeFlow extends AbstractResponse
{

    public function __construct($response)
    {
        parent::__construct($response);
    }

    /**
     * @return \SecurionPay\Response\ChargeFlowReturn
     */
    public function getChargeFlowReturn()
    {
        return $this->getObject('chargeFlowReturn', '\SecurionPay\Response\ChargeFlowReturn');
    }

    public function getNextAction()
    {
        return $this->get('nextAction');
    }

    public function getReturnUrl()
    {
        return $this->get('returnUrl');
    }
}

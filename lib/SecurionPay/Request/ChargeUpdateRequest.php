<?php
namespace SecurionPay\Request;

class ChargeUpdateRequest extends AbstractRequest
{

    public function getChargeId()
    {
        return $this->get('chargeId');
    }

    public function chargeId($chargeId)
    {
        return $this->set('chargeId', $chargeId);
    }

    public function getDescription()
    {
        return $this->get('description');
    }

    public function description($description)
    {
        return $this->set('description', $description);
    }

    public function getCustomerId()
    {
        return $this->get('customerId');
    }

    public function customerId($customerId)
    {
        return $this->set('customerId', $customerId);
    }

    public function getMetadata()
    {
        return $this->get('metadata');
    }

    public function metadata($metadata)
    {
        return $this->set('metadata', $metadata);
    }
}

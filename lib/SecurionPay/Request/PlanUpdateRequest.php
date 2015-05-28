<?php
namespace SecurionPay\Request;

class PlanUpdateRequest extends AbstractRequest
{

    public function getPlanId()
    {
        return $this->get('planId');
    }

    public function planId($planId)
    {
        return $this->set('planId', $planId);
    }

    public function getName()
    {
        return $this->get('name');
    }

    public function name($name)
    {
        return $this->set('name', $name);
    }

    public function getStatementDescription()
    {
        return $this->get('statementDescription');
    }

    public function statementDescription($statementDescription)
    {
        return $this->set('statementDescription', $statementDescription);
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

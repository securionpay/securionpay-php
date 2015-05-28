<?php
namespace SecurionPay\Exception;

use SecurionPay\Response\ErrorResponse;

class SecurionPayException extends \Exception
{

    private $type;

    private $chargeId;

    private $blacklistRuleId;

    public function __construct($error = null)
    {
        if ($error instanceof ErrorResponse) {
            parent::__construct($error->getMessage());
            
            $this->type = $error->getType();
            $this->code = $error->getCode();
            $this->chargeId = $error->getChargeId();
            $this->blacklistRuleId = $error->getBlacklistRuleId();
        } else {
            parent::__construct($error);
        }
    }

    public function getType()
    {
        return $this->type;
    }

    public function getChargeId()
    {
        return $this->chargeId;
    }

    public function getBlacklistRuleId()
    {
        return $this->blacklistRuleId;
    }
}

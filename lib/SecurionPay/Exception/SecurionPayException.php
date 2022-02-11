<?php
namespace SecurionPay\Exception;

use SecurionPay\Response\ErrorResponse;

class SecurionPayException extends \Exception
{

    private $type;

    private $chargeId;

    private $blacklistRuleId;

    private $issuerDeclineCode;

    public function __construct($error = null)
    {
        if ($error instanceof ErrorResponse) {
            parent::__construct($error->getMessage());
            
            $this->type = $error->getType();
            $this->code = $error->getCode();
            $this->chargeId = $error->getChargeId();
            $this->blacklistRuleId = $error->getBlacklistRuleId();
            $this->issuerDeclineCode = $error->getIssuerDeclineCode();
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

    public function getIssuerDeclineCode()
    {
        return $this->issuerDeclineCode;
    }
}

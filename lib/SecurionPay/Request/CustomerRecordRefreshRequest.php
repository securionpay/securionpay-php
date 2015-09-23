<?php
namespace SecurionPay\Request;

class CustomerRecordRefreshRequest extends AbstractRequest
{

    public function getCustomerRecordId()
    {
        return $this->get('customerRecordId');
    }

    public function customerRecordId($customerRecordId)
    {
        return $this->set('customerRecordId', $customerRecordId);
    }

    public function getBoolean()
    {
        return $this->get('subscription');
    }

    public function subscription($subscription)
    {
        return $this->set('subscription', $subscription);
    }
}

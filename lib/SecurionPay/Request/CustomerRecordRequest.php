<?php
namespace SecurionPay\Request;

class CustomerRecordRequest extends AbstractRequest
{

    public function getEmail()
    {
        return $this->get('email');
    }

    public function email($email)
    {
        return $this->set('email', $email);
    }

    public function getSubscription()
    {
        return $this->get('subscription');
    }

    public function subscription($subscription)
    {
        return $this->set('subscription', $subscription);
    }
}

<?php
namespace SecurionPay\Request;

class CheckoutRequest extends AbstractRequest
{

    /**
     * @return \SecurionPay\Request\CheckoutRequestCharge
     */
    public function getCharge()
    {
        return $this->getObject('charge', '\SecurionPay\Request\CheckoutRequestCharge');
    }

    public function charge($charge)
    {
        return $this->set('charge', $charge);
    }

    /**
     * @return \SecurionPay\Request\CheckoutRequestSubscription
     */
    public function getSubscription()
    {
        return $this->getObject('subscription', '\SecurionPay\Request\CheckoutRequestSubscription');
    }

    public function subscription($subscription)
    {
        return $this->set('subscription', $subscription);
    }

    public function getCustomerId()
    {
        return $this->get('customerId');
    }

    public function customerId($customerId)
    {
        return $this->set('customerId', $customerId);
    }

    public function getCrossSaleOfferIds()
    {
        return $this->get('crossSaleOfferIds');
    }

    public function crossSaleOfferIds($crossSaleOfferIds)
    {
        return $this->set('crossSaleOfferIds', $crossSaleOfferIds);
    }

    public function getRememberMe()
    {
        return $this->get('rememberMe');
    }

    public function rememberMe($rememberMe)
    {
        return $this->set('rememberMe', $rememberMe);
    }
}

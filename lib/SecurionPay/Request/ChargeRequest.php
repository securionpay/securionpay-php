<?php
namespace SecurionPay\Request;

class ChargeRequest extends AbstractRequest
{

    public function getAmount()
    {
        return $this->get('amount');
    }

    public function amount($amount)
    {
        return $this->set('amount', $amount);
    }

    public function getCurrency()
    {
        return $this->get('currency');
    }

    public function currency($currency)
    {
        return $this->set('currency', $currency);
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

    /**
     * @return \SecurionPay\Request\CardRequest
     */
    public function getCard()
    {
        $card = $this->get('card');
        
        if (is_array($card)) {
            return $this->getObject('card', '\SecurionPay\Request\CardRequest');
        } else {
            return $card;
        }
    }

    public function card($card)
    {
        return $this->set('card', $card);
    }

    /**
     * @return \SecurionPay\Request\PaymentMethodRequest
     */
    public function getPaymentMethod()
    {
        $paymentMethod = $this->get('paymentMethod');

        if (is_array($paymentMethod)) {
            return $this->getObject('paymentMethod', '\SecurionPay\Request\PaymentMethodRequest');
        } else {
            return $paymentMethod;
        }
    }

    public function paymentMethod($paymentMethod)
    {
        return $this->set('paymentMethod', $paymentMethod);
    }

    /**
     * @return \SecurionPay\Request\ChargeFlowRequest
     */
    public function getFlow()
    {
        return $this->getObject('flow', '\SecurionPay\Request\ChargeFlowRequest');
    }

    public function flow($flow)
    {
        return $this->set('flow', $flow);
    }

    public function getCaptured()
    {
        return $this->get('captured');
    }

    public function captured($captured)
    {
        return $this->set('captured', $captured);
    }

    /**
     * @return \SecurionPay\Request\ShippingRequest
     */
    public function getShipping()
    {
        return $this->getObject('shipping', '\SecurionPay\Request\ShippingRequest');
    }

    public function shipping($shipping)
    {
        return $this->set('shipping', $shipping);
    }

    /**
     * @return \SecurionPay\Request\BillingRequest
     */
    public function getBilling()
    {
        return $this->getObject('billing', '\SecurionPay\Request\BillingRequest');
    }

    public function billing($billing)
    {
        return $this->set('billing', $billing);
    }

    /**
     * @return \SecurionPay\Request\ThreeDSecureRequest
     */
    public function getThreeDSecure()
    {
        return $this->getObject('threeDSecure', '\SecurionPay\Request\ThreeDSecureRequest');
    }

    public function threeDSecure($threeDSecure)
    {
        return $this->set('threeDSecure', $threeDSecure);
    }

    public function getMerchantAccountId()
    {
        return $this->get('merchantAccountId');
    }
    
    public function merchantAccountId($merchantAccountId)
    {
        return $this->set('merchantAccountId', $merchantAccountId);
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

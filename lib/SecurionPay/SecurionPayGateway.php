<?php
namespace SecurionPay;

use SecurionPay\Connection\Connection;
use SecurionPay\Connection\CurlConnection;
use SecurionPay\Exception\SecurionPayException;
use SecurionPay\Util\ObjectSerializer;

/**
 * @version 2.1.1-rc3
 */
class SecurionPayGateway
{
    const VERSION = '2.2.0';
    const DEFAULT_ENDPOINT = 'https://api.securionpay.com';

    private $objectSerializer;
    
    /**
     * @var \SecurionPay\API\AbstractConnection
     */
    private $connection;

    private $privateKey;

    private $endpoint = self::DEFAULT_ENDPOINT;
    
    private $userAgent;

    public function __construct($privateKey = null, Connection $connection = null)
    {
        $this->objectSerializer = new ObjectSerializer();
        
        $this->privateKey = $privateKey;
        $this->connection = $connection ? $connection : new CurlConnection();
    }

    /**
     * @param \SecurionPay\Request\ChargeRequest $request
     * @return \SecurionPay\Response\Charge
     */
    public function createCharge($request) {
        return $this->post('/charges', $request, '\SecurionPay\Response\Charge');
    }

    /**
     * @param \SecurionPay\Request\CaptureRequest $request
     * @return \SecurionPay\Response\Charge
     */
    public function captureCharge($request) {
        return $this->post('/charges/{chargeId}/capture', $request, '\SecurionPay\Response\Charge');
    }
    
    /**
     * @param string $chargeId
     * @return \SecurionPay\Response\Charge
     */
    public function retrieveCharge($chargeId) {
        return $this->get("/charges/{$chargeId}", '\SecurionPay\Response\Charge');
    }
    
    /**
     * @param \SecurionPay\Request\ChargeUpdateRequest $request
     * @return \SecurionPay\Response\Charge
     */
    public function updateCharge($request) {
        return $this->post('/charges/{chargeId}', $request, '\SecurionPay\Response\Charge');
    }
    
    /**
     * @param \SecurionPay\Request\RefundRequest $request
     * @return \SecurionPay\Response\Charge
     */
    public function refundCharge($request) {
        return $this->post('/charges/{chargeId}/refund', $request, '\SecurionPay\Response\Charge');
    }
    
    /**
     * @param \SecurionPay\Request\ChargeListRequest $request
     * @return \SecurionPay\Response\ListResponse
     */
    public function listCharges($request = null) {
        return $this->getList('/charges', $request, '\SecurionPay\Response\Charge');
    }

    /**
     * @param \SecurionPay\Request\CustomerRequest $request
     * @return \SecurionPay\Response\Customer
     */
    public function createCustomer($request) {
        return $this->post('/customers', $request, '\SecurionPay\Response\Customer');
    }
    
    /**
     * @param string $customerId
     * @return \SecurionPay\Response\Customer
     */
    public function retrieveCustomer($customerId) {
        return $this->get("/customers/{$customerId}", '\SecurionPay\Response\Customer');
    }

    /**
     * @param \SecurionPay\Request\CustomerUpdateRequest $request
     * @return \SecurionPay\Response\Customer
     */
    public function updateCustomer($request) {
        return $this->post('/customers/{customerId}', $request, '\SecurionPay\Response\Customer');
    }
    
    /**
     * @param string $customerId
     * @return \SecurionPay\Response\DeleteResponse
     */
    public function deleteCustomer($customerId) {
        return $this->delete("/customers/{$customerId}", null, '\SecurionPay\Response\DeleteResponse');
    }
    
    /**
     * @param \SecurionPay\Request\CustomerListRequest $request
     * @return \SecurionPay\Response\ListResponse
     */
    public function listCustomers($request = null) {
        return $this->getList('/customers', $request, '\SecurionPay\Response\Customer');
    }

    /**
     * @param \SecurionPay\Request\CardRequest $request
     * @return \SecurionPay\Response\Card
     */
    public function createCard($request) {
        return $this->post('/customers/{customerId}/cards', $request, '\SecurionPay\Response\Card');
    }

    /**
     * @param string $customerId
     * @param string $cardId
     * @return \SecurionPay\Response\Card
     */
    public function retrieveCard($customerId, $cardId) {
        return $this->get("/customers/{$customerId}/cards/{$cardId}", '\SecurionPay\Response\Card');
    }

    /**
     * @param \SecurionPay\Request\CardUpdateRequest $request
     * @return \SecurionPay\Response\Card
     */
    public function updateCard($request) {
        return $this->post('/customers/{customerId}/cards/{cardId}', $request, '\SecurionPay\Response\Card');
    }

    /**
     * @param string $customerId
     * @param string $cardId
     * @return \SecurionPay\Response\DeleteResponse
     */
    public function deleteCard($customerId, $cardId) {
        return $this->delete("/customers/{$customerId}/cards/{$cardId}", null, '\SecurionPay\Response\DeleteResponse');
    }

    /**
     * @param \SecurionPay\Request\CardListRequest $request
     * @return \SecurionPay\Response\ListResponse
     */
    public function listCards($request) {
        return $this->getList('/customers/{customerId}/cards', $request, '\SecurionPay\Response\Card');
    }

    /**
     * @param \SecurionPay\Request\SubscriptionRequest $request
     * @return \SecurionPay\Response\Subscription
     */
    public function createSubscription($request) {
        return $this->post('/customers/{customerId}/subscriptions', $request, '\SecurionPay\Response\Subscription');
    }

    /**
     * @param string $customerId
     * @param string $subscriptionId
     * @return \SecurionPay\Response\Subscription
     */
    public function retrieveSubscription($customerId, $subscriptionId) {
        return $this->get("/customers/{$customerId}/subscriptions/{$subscriptionId}", '\SecurionPay\Response\Subscription');
    }

    /**
     * @param \SecurionPay\Request\SubscriptionUpdateRequest $request
     * @return \SecurionPay\Response\Subscription
     */
    public function updateSubscription($request) {
        return $this->post('/customers/{customerId}/subscriptions/{subscriptionId}', $request, '\SecurionPay\Response\Subscription');
    }

    /**
     * @param \SecurionPay\Request\SubscriptionCancelRequest $request
     * @return \SecurionPay\Response\Subscription
     */
    public function cancelSubscription($request) {
        return $this->delete('/customers/{customerId}/subscriptions/{subscriptionId}', $request, '\SecurionPay\Response\Subscription');
    }

    /**
     * @param \SecurionPay\Request\SubscriptionListRequest $request
     * @return \SecurionPay\Response\ListResponse
     */
    public function listSubscriptions($request) {
        return $this->getList('/customers/{customerId}/subscriptions', $request, '\SecurionPay\Response\Subscription');
    }

    /**
     * @param \SecurionPay\Request\PlanRequest $request
     * @return \SecurionPay\Response\Plan
     */
    public function createPlan($request) {
        return $this->post('/plans', $request, '\SecurionPay\Response\Plan');
    }

    /**
     * @param string $planId
     * @return \SecurionPay\Response\Plan
     */
    public function retrievePlan($planId) {
        return $this->get("/plans/{$planId}", '\SecurionPay\Response\Plan');
    }

    /**
     * @param \SecurionPay\Request\PlanUpdateRequest $request
     * @return \SecurionPay\Response\Plan
     */
    public function updatePlan($request) {
        return $this->post('/plans/{planId}', $request, '\SecurionPay\Response\Plan');
    }

    /**
     * @param string $planId
     * @return \SecurionPay\Response\DeleteResponse
     */
    public function deletePlan($planId) {
        return $this->delete("/plans/{$planId}", null, '\SecurionPay\Response\DeleteResponse');
    }

    /**
     * @param \SecurionPay\Request\PlanListRequest $request
     * @return \SecurionPay\Response\ListResponse
     */
    public function listPlans($request = null) {
        return $this->getList('/plans', $request, '\SecurionPay\Response\Plan');
    }

    /**
     * @param string $eventId
     * @return \SecurionPay\Response\Event
     */
    public function retrieveEvent($eventId) {
        return $this->get("/events/{$eventId}", '\SecurionPay\Response\Event');
    }

    /**
     * @param \SecurionPay\Request\EventListRequest $request
     * @return \SecurionPay\Response\ListResponse
     */
    public function listEvents($request = null) {
        return $this->getList('/events', $request, '\SecurionPay\Response\Event');
    }

    /**
     * @param \SecurionPay\Request\TokenRequest $request
     * @return \SecurionPay\Response\Token
     */
    public function createToken($request) {
        return $this->post('/tokens', $request, '\SecurionPay\Response\Token');
    }

    /**
     * @param string $tokenId
     * @return \SecurionPay\Response\Token
     */
    public function retrieveToken($tokenId) {
        return $this->get("/tokens/{$tokenId}", '\SecurionPay\Response\Token');
    }

    /**
     * @param \SecurionPay\Request\BlacklistRuleRequest $request
     * @return \SecurionPay\Response\BlacklistRule
     */
    public function createBlacklistRule($request) {
        return $this->post('/blacklist', $request, '\SecurionPay\Response\BlacklistRule');
    }

    /**
     * @param string $blacklistRuleId
     * @return \SecurionPay\Response\BlacklistRule
     */
    public function retrieveBlacklistRule($blacklistRuleId) {
        return $this->get("/blacklist/{$blacklistRuleId}", '\SecurionPay\Response\BlacklistRule');
    }

    /**
     * @param string $blacklistRuleId
     * @return \SecurionPay\Response\DeleteResponse
     */
    public function deleteBlacklistRule($blacklistRuleId) {
        return $this->delete("/blacklist/{$blacklistRuleId}", null, '\SecurionPay\Response\DeleteResponse');
    }

    /**
     * @param \SecurionPay\Request\BlacklistRuleListRequest $request
     * @return \SecurionPay\Response\ListResponse
     */
    public function listBlacklistRules($request = null) {
        return $this->getList('/blacklist', $request, '\SecurionPay\Response\BlacklistRule');
    }

    /**
     * @param \SecurionPay\Request\CrossSaleOfferRequest $request
     * @return \SecurionPay\Response\CrossSaleOffer
     */
    public function createCrossSaleOffer($request) {
        return $this->post('/cross-sale-offers', $request, '\SecurionPay\Response\CrossSaleOffer');
    }

    /**
     * @param string $blacklistRuleId
     * @return \SecurionPay\Response\CrossSaleOffer
     */
    public function retrieveCrossSaleOffer($crossSaleOfferId) {
        return $this->get("/cross-sale-offers/{$crossSaleOfferId}", '\SecurionPay\Response\CrossSaleOffer');
    }

    /**
     * @param \SecurionPay\Request\CrossSaleOfferUpdateRequest $request
     * @return \SecurionPay\Response\CrossSaleOffer
     */
    public function updateCrossSaleOffer($request) {
        return $this->post('/cross-sale-offers/{crossSaleOfferId}', $request, '\SecurionPay\Response\CrossSaleOffer');
    }

    /**
     * @param string $crossSaleOfferId
     * @return \SecurionPay\Response\DeleteResponse
     */
    public function deleteCrossSaleOffer($crossSaleOfferId) {
        return $this->delete("/cross-sale-offers/{$crossSaleOfferId}", null, '\SecurionPay\Response\DeleteResponse');
    }

    /**
     * @param \SecurionPay\Request\CrossSaleOfferListRequest $request
     * @return \SecurionPay\Response\ListResponse
     */
    public function listCrossSaleOffers($request) {
        return $this->getList('/cross-sale-offers', $request, '\SecurionPay\Response\CrossSaleOffer');
    }

    /**
     * @param \SecurionPay\Request\CustomerRecordRequest $request
     * @return \SecurionPay\Response\CustomerRecord
     */
    public function createCustomerRecord($request) {
        return $this->post('/customer-records', $request, '\SecurionPay\Response\CustomerRecord');
    }
    
    /**
     * @param \SecurionPay\Request\CustomerRecordRefreshRequest $request
     * @return \SecurionPay\Response\CustomerRecord
     */
    public function refreshCustomerRecord($request) {
        return $this->post('/customer-records/{customerRecordId}', $request, '\SecurionPay\Response\CustomerRecord');
    }
    
    /**
     * @param string $customerRecordId
     * @return \SecurionPay\Response\CustomerRecord
     */
    public function retrieveCustomerRecord($customerRecordId) {
        return $this->get("/customer-records/{$customerRecordId}", '\SecurionPay\Response\CustomerRecord');
    }

    /**
     * @param \SecurionPay\Request\CustomerRecordListRequest $request
     * @return \SecurionPay\Response\ListResponse
     */
    public function listCustomerRecords($request) {
        return $this->getList('/customer-records', $request, '\SecurionPay\Response\CustomerRecord');
    }
    
    /**
     * @param string $customerRecordId
     * @param string $customerRecordFeeId
     * @return \SecurionPay\Response\CustomerRecordFee
     */
    public function retrieveCustomerRecordFee($customerRecordId, $customerRecordFeeId) {
        return $this->get("/customer-records/{$customerRecordId}/fees/{$customerRecordFeeId}", '\SecurionPay\Response\CustomerRecordFee');
    }

    /**
     * @param \SecurionPay\Request\CustomerRecordFeeListRequest $request
     * @return \SecurionPay\Response\ListResponse
     */
    public function listCustomerRecordFees($request) {
        return $this->getList('/customer-records/{customerRecordId}/fees', $request, '\SecurionPay\Response\CustomerRecordFee');
    }

    /**
     * @param string $customerRecordId
     * @param string $customerRecordProfitId
     * @return \SecurionPay\Response\CustomerRecordFee
     */
    public function retrieveCustomerRecordProfit($customerRecordId, $customerRecordProfitId) {
        return $this->get("/customer-records/{$customerRecordId}/profits/{$customerRecordProfitId}", '\SecurionPay\Response\CustomerRecordProfit');
    }

    /**
     * @param \SecurionPay\Request\CustomerRecordProfitListRequest $request
     * @return \SecurionPay\Response\ListResponse
     */
    public function listCustomerRecordProfits($request) {
        return $this->getList('/customer-records/{customerRecordId}/profits', $request, '\SecurionPay\Response\CustomerRecordProfit');
    }

    /**
     * @param \SecurionPay\Request\CheckoutRequest $request
     * @return string
     */
    public function signCheckoutRequest($request) {
        $path = '';
        $data = $this->objectSerializer->serialize($request, $path);
        
        $signarute = hash_hmac('sha256', $data, $this->privateKey);
        
        return base64_encode($signarute . "|" . $data);
    }

    private function get($path, $responseClass) {
        $response = $this->connection->get($this->endpoint . $path, $this->buildHeaders());
        $this->ensureSuccess($response);
        return $this->objectSerializer->deserialize($response['body'], $responseClass);
    }
    
    private function post($path, $request, $responseClass) {
        $requestBody = $this->objectSerializer->serialize($request, $path);
        $response = $this->connection->post($this->endpoint . $path, $requestBody, $this->buildHeaders());
        $this->ensureSuccess($response);
        return $this->objectSerializer->deserialize($response['body'], $responseClass);
    }
    
    private function getList($path, $request, $elementClass) {
        $url = $this->buildQueryString($this->endpoint . $path, $request);
        $response = $this->connection->get($url, $this->buildHeaders());
        $this->ensureSuccess($response);
        return $this->objectSerializer->deserializeList($response['body'], $elementClass);
    }

    private function delete($path, $request, $responseClass) {
        $url = $this->endpoint . $this->buildQueryString($path, $request);
        $response = $this->connection->delete($url, $this->buildHeaders());
        $this->ensureSuccess($response);
        return $this->objectSerializer->deserialize($response['body'], $responseClass);
    }
    
    private function ensureSuccess($response) {
        if ($response['status'] != 200) {
            $error = $this->objectSerializer->deserialize($response['body'], '\SecurionPay\Response\ErrorResponse');
            throw new SecurionPayException($error);
        }
        return $response;
    }
    
    private function buildQueryString($path, $request) {
        if ($request == null) {
            return $path;
        }

        $queryString = $this->objectSerializer->serializeToQueryString($request, $path);
        return $path . $queryString;
    }

    private function buildHeaders() {
        return array(
            'Authorization' => 'Basic ' . base64_encode($this->privateKey . ':'),
        	'Content-Type' => 'application/json',
            'User-Agent' => ($this->userAgent ? $this->userAgent . ' ' : '') . 'SecurionPay-PHP/' . self::VERSION . ' (PHP/' . phpversion() . ')'
        );
    }

    public function setPrivateKey($privateKey)
    {
        $this->privateKey = $privateKey;
    }

    public function setConnection(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }
    
    public function setUserAgent($userAgent)
    {
    	$this->userAgent = $userAgent;
    }
}

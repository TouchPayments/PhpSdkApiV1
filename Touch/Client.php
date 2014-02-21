<?php
/**
 * Touch Payments Rest Client
 * 
 * @copyright 2013 Check'n Pay Finance Pty Limited
 */
class Touch_Client {

    private $_apiKey;
    private $_url;
    private $_port;

    public function __construct($apiKey, $url, $port = 80)
    {
        $this->_url = $url;
        $this->_apiKey = $apiKey;
        $this->_port = $port;
    }

    /**
     * @param string $token
     */
    public function getRedirectUrl($token)
    {
        return str_ireplace('/api', '/check/index/token/', $this->_url). $token;
    }
    
    /**
     * get a maximum checkout Value
     * @return float
     */
    public function getMaximumCheckoutValue()
    {
        $data = array($this->_apiKey);
        return $this->_callMethod('getMaximumCheckoutValue', $data);
    }

    /**
     * simple check if Touch works
     * @return mixed
     */
    public function ping()
    {
        $data = array($this->_apiKey);
        return $this->_callMethod('ping', $data);
    }

    /**
     * Check if Api is available at the time
     * 
     * @return mixed
     */
    public function isApiActive()
    {
        $data = array($this->_apiKey);
        return $this->_callMethod('apiActive', $data);
    }
    /**
     * set whole order to cancelled
     * 
     * @param string $refNr
     * @param string $reason
     * @return type
     */
    public function setOrderStatusCancelled($refNr,$reason)
    {
        $data = array($this->_apiKey, $refNr , $reason);
        return $this->_callMethod('setOrderStatusCancelled', $data);
    }

    /**
     * Set order item to cancelled
     * 
     * @param string $refNr
     * @param mixed $itemIds
     * @param string $reason
     * @return mixed
     */
    public function setOrderItemStatusCancelled($refNr, $itemIds, $reason)
    {
        $data = array($this->_apiKey, $refNr ,$itemIds , $reason);
        return $this->_callMethod('setOrderItemStatusCancelled', $data);
    }
    
    /**
     * 
     * @param string $refNr
     * @param mixed $articleLines
     */
    public function setOrderStatusShipped($refNr)
    {
        $data = array($this->_apiKey, $refNr);
        return $this->_callMethod('setOrderStatusShipped', $data);
    }

    public function generateOrder(Touch_Order $order)
    {
        
        $data = array($this->_apiKey, $order->toArray());
        return $this->_callMethod('generateOrder', $data);
    }

    
    public function getOrder($refNr)
    {
        $data = array($this->_apiKey, $refNr);
        return $this->_callMethod('getOrder', $data);
    }
    
    public function getOrderStatusFromToken($token)
    {
        $data = array($this->_apiKey, $token);
        return $this->_callMethod('getOrderStatusFromToken', $data);
    }

    public function approveOrderByToken($token, $refNumber, $grandTotal)
    {
        $data = array($this->_apiKey, $token, $refNumber, $grandTotal);
        return $this->_callMethod('approveOrderByToken', $data);
    }
    /**
     * approving order via SMS code
     * 
     * @param string $token
     * @param string $refNumber
     * @param string $grandTotal
     * @param string $smsCode
     * @return mixed
     */
    public function approveOrderBySmsCode($token, $refNumber, $grandTotal, $smsCode)
    {
        $data = array($this->_apiKey, $token, $refNumber, $grandTotal, $smsCode);
        return $this->_callMethod('approveOrderBySmsCode', $data);
    }

    public function getFee($grandTotal)
    {
        $data = array($this->_apiKey, $grandTotal);
        return $this->_callMethod('getFeeAmount', $data);
    }

    private function _callMethod($method, $data)
    {
        $params = array(
            'jsonrpc’ => ’2.0',
            'method' => $method,
            'params' => $data,
            'id' => uniqid()
        );

      
        
        $context = stream_context_create(array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-Type: application/json\r\n',
                'content' => json_encode($params)
            )
        ));
        
        $jsonResponse = file_get_contents($this->_url, FALSE, $context);
        
        return json_decode($jsonResponse);
    }

}
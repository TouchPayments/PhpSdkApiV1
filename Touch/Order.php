<?php

/**
 * Touch Payments Order Object Class
 *
 * @copyright 2013 Check'n Pay Finance Pty Limited
 */
class Touch_Order extends Touch_Object
{

    /**
     * @var float grand total
     */
    public $grandTotal;

    /**
     * @var float shipping costs
     */
    public $shippingCosts;

    /**
     * @var float GST
     */
    public $gst;

    /**
     * @var Touch_Item[] array of items
     */
    public $items;

    /**
     * @var Touch_Address address for shipping
     */
    public $addressShipping;

    /**
     * @var Touch_Address address for billing
     */
    public $addressBilling;

    /**
     * @var Touch_Customer customer
     */
    public $customer;

    /**
     * @var int number of extending days
     */
    public $extendingDays;

    /**
     * @var Touch_ShippingMethod shipping method to use
     */
    public $shippingMethods;

    /**
     * @var string returned by sesion_id()
     */
    public $clientSessionId;

    /**
     * @return array
     * @throws Exception
     */
    public function toArray()
    {
        $return = array();
        foreach ($this as $key => $value) {
            if ($key == 'items') {
                if (!array($value)) {
                    throw new Exception('Items need to be an array of items');
                }
                foreach ($value as $item) {
                    if (!$item instanceof Touch_Item) {
                        throw new Exception('Items needs to be of type Touch_Item');
                    }
                    $return['items'][] = $item->toArray();
                }
                continue;
            }

            if ($value instanceof Touch_Object) {
                $return[$key] = $value->toArray();
            } else {
                $return[$key] = $value;
            }
        }
        return $return;
    }

}
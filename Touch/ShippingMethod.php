<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 05/06/14
 * Time: 16:27
 */


/**
 * Class Touch_ShippingMethod
 * A container for shipping methods
 * You should set it in Touch_Order when sending the order to the touch API if and _ONLY IF_ the shipping methods are
 * linked to the order and would not change according to the address (note that at the moment, Touch Payment is only offering its service in Australia)
 */
class Touch_ShippingMethod extends Touch_Object
{
    /**
     * @var string mame of this shipping method
     * Keep It Short BUT UNIQUE as it will be returned by Touch Payment to specify the customer's choice
     */
    public $label;


    /**
     * @var string longueur description of this shipping methods. This will be displayed side by side with the label
     * It should contains short and important information, such as expecting days or price by KG
     */
    public $description;

    /**
     * @var string this contains additional details, as long as you want to make it
     * Not used at the moment
     */
    public $additionalDetails;

    /**
     * @var boolean enable a method for a certain order
     * This field should be used to send additional methods which could be available to the user _if_
     * For example, for an order of 9 AUD
     *  ShippingMethod {
     *      [label] => "Free shipping"
     *      [description] => "3 to 5 days Australia-wide!"
     *      [additionalDetails] => "For a cart superior or equals to 10 AUD"
     *      [isEligible] => false
     *  }
     * BUT this should NOT be used to send ShippingMethod irrelevant to the customer(ex: how much it could cost him to ship his order to Reykjavik if he does not live here)
     */
    public $isEligible;

    /**
     * @var float cost of this shipping method
     */
    public $cost;
}
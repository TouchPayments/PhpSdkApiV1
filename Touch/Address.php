<?php

/**
 * Touch Payments Address Object Wrapper
 *
 * @copyright 2013 Check'n Pay Finance Pty Limited
 */
class Touch_Address extends Touch_Object
{

    /**
     * Australia country code
     */
    const COUNTRY_AU = 'au';

    /**
     * @var string first name
     */
    public $firstName;
    /**
     * @var string last name
     */
    public $lastName;
    /**
     * @var string middle name
     */
    public $middleName;
    /**
     * @var string number on the street
     */
    public $number;

    /**
     * @var string first line of the address
     */
    public $addressOne;

    /**
     * @var string second line of the address
     */
    public $addressTwo;

    /**
     * @var string postcode
     */
    public $postcode;

    /**
     * @var string suburb
     */
    public $suburb;

    /**
     * @var string state
     */
    public $state;

    /**
     * @var string country
     */
    public $country;

    public function __construct($country = self::COUNTRY_AU)
    {
        $this->country = $country;
    }
}
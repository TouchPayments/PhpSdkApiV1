<?php

/**
 * Touch Payments Customer Object Wrapper
 *
 * @copyright 2013 Check'n Pay Finance Pty Limited
 */
class Touch_Customer extends Touch_Object
{

    /**
     * @var string email
     */
    public $email;

    /**
     * @var string first name
     */
    public $firstName;

    /**
     * @var string last name
     */
    public $lastName;

    /**
     * @var string gender
     */
    public $gender;

    /**
     * @var string mobile phone
     */
    public $telephoneMobile;

    /**
     * @var string date of birth
     * eg 12/07/1998
     */
    public $dob;

    /**
     * @var boolean
     */
    public $isReturning;
}

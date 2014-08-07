<?php

/**
 * Touch Payments Item Class
 *
 * @copyright 2013 Check'n Pay Finance Pty Limited
 */
class Touch_Item extends Touch_Object
{


    const STATUS_ACTIVE = 'active';
    const STATUS_ACTIVEDUE = 'activeDue';
    const STATUS_APPROVED = 'approved';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_INCOLLECTION = 'inCollection';
    const STATUS_MIXED = 'mixed';
    const STATUS_NEW = 'new';
    const STATUS_OVERDUE = 'overdue';
    const STATUS_PAID = 'paid';
    const STATUS_PAYMENTDELAYED = 'paymentDelayed';
    const STATUS_PAYMENTREFUSED = 'paymentRefused';
    const STATUS_PENDING = 'pending';
    const STATUS_RETURNAPPROVALPENDING = 'returnApprovalPending';
    const STATUS_RETURNAPPROVALPENDINGAFTERPAYMENT = 'returnApprovalPendingAfterPayment';
    const STATUS_RETURNED = 'returned';
    const STATUS_RETURNEDAFTERPAYMENT = 'returnedAfterPayment';
    const STATUS_SHIPPED = 'shipped';
    const STATUS_UNABLETOFULLFILL = 'unableToFullFill';

    /**
     * @var string SKU
     * Stock keeping unit. A unique id for this item
     */
    public $sku;

    /**
     * @var float unit price of the item
     */
    public $price;

    /**
     * @var string short description of the item
     */
    public $description;

    /**
     * @var int quantity of this items in the order
     */
    public $quantity;

    /**
     * @var string url of the picture of the item
     */
    public $image;


}
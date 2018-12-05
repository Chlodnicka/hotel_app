<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 18:53
 */

namespace HotelApp\Domain\Model\Payment;


use HotelApp\Domain\Model\Visit;

class FullPayment extends Payment
{
    /** @var  Visit */
    private $visit;
}
<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 18:52
 */

namespace HotelApp\Domain\Model\Payment;


use HotelApp\Domain\Model\Reservation;

class AdvancePayment extends Payment
{
    /** @var Reservation */
    private $reservation;
}
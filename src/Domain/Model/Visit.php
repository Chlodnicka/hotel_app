<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 18:45
 */

namespace HotelApp\Domain\Model;


use HotelApp\Domain\Model\Payment\FullPayment;

class Visit
{
    /** @var  int */
    private $id;

    /** @var  \DateTime */
    private $startDate;

    /** @var  \DateTime */
    private $endDate;

    /** @var  Money */
    private $price;

    /** @var  Status */ //can be in_progress|finished
    private $status;

    /** @var  FullPayment */
    private $payment;

    /** @var  Reservation */
    private $reservation;
}
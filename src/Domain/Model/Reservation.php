<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 15.09.2018
 * Time: 16:45
 */

namespace HotelApp\Domain\Model;

use HotelApp\Domain\Model\Payment\AdvancePayment;

class Reservation
{
    /** @var  int */
    private $id;

    /** @var  \DateTime */
    private $startDate;

    /** @var  \DateTime */
    private $endDate;

    /** @var  Status */ //can be 'planned|cancelled|finished'
    private $status;

    /** @var Money */
    private $fullPrice;

    /** @var  Money|null */
    private $advancePaymentPrice;

    /** @var  AdvancePayment */
    private $advancePayment;

    /** @var  Room */
    private $room;

    /** @var Guest */
    private $guest;

    /** @var Visit*/
    private $visit;
}
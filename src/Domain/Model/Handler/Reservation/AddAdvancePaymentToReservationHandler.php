<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:37
 */

namespace HotelApp\Domain\Model\Command\Reservation;


use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

class AddAdvancePaymentToReservationHandler extends Command
{
    use PayloadTrait;

    public function id(): string
    {
        return $this->payload()['id'];
    }

    public function reservationId(): string
    {
        return $this->payload()['reservationId'];
    }

    public function amount(): string
    {
        return $this->payload()['amount'];
    }

}
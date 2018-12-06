<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:45
 */

namespace HotelApp\Domain\Model\Command\Reservation;


use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

class CancelReservation extends Command
{
    use PayloadTrait;

    public function id(): string
    {
        return $this->payload()['id'];
    }

}
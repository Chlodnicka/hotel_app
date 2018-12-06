<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:23
 */

namespace HotelApp\Domain\Model\Command\Reservation;

use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

class CreateReservationHandler extends Command
{
    use PayloadTrait;

    public function id(): string
    {
        return $this->payload()['id'];
    }

    public function startDate(): \DateTime
    {
        return $this->payload()['startDate'];
    }

    public function endDate(): string
    {
        return $this->payload()['endDate'];
    }

    public function roomId(): string
    {
        return $this->payload()['roomId'];
    }

    public function numberOfPeople(): string
    {
        return $this->payload()['numberOfPeople'];
    }

    public function guestId(): string
    {
        return $this->payload()['guestId'];
    }

}
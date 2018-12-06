<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:40
 */

namespace HotelApp\Domain\Model\Command\Visit;

use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

class CreateVisitHandler extends Command
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

    public function startDate(): \DateTime
    {
        return $this->payload()['startDate'];
    }

    public function endDate(): \DateTime
    {
        return $this->payload()['endDate'];
    }

    public function numberOfPeople(): \DateTime
    {
        return $this->payload()['numberOfPeople'];
    }
}
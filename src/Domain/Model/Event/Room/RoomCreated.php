<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:18
 */

namespace HotelApp\Domain\Model\Event\Room;

use Prooph\EventSourcing\AggregateChanged;

class RoomCreated extends AggregateChanged
{
    public function number(): int
    {
        return $this->payload()['number'];
    }

    public function capacity(): int
    {
        return $this->payload()['capacity'];
    }

    public function price(): float
    {
        return $this->payload()['price'];
    }

}
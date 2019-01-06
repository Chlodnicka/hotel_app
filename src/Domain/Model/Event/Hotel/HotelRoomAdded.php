<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:20
 */

namespace HotelApp\Domain\Model\Command\Hotel;


use HotelApp\Domain\Model\Room;
use Prooph\EventSourcing\AggregateChanged;

class HotelRoomAdded extends AggregateChanged
{
    public function room(): Room
    {
        return $this->payload()['room'];
    }

}
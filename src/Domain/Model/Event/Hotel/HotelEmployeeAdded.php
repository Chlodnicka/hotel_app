<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:15
 */

namespace HotelApp\Domain\Model\Event\Hotel;

use HotelApp\Domain\Model\User;
use Prooph\EventSourcing\AggregateChanged;

class HotelEmployeeAdded extends AggregateChanged
{

    public function employee(): User
    {
        return $this->payload()['employee'];
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:15
 */

namespace HotelApp\Domain\Model\Event\Hotel;


use HotelApp\Domain\Model\Address;
use Prooph\EventSourcing\AggregateChanged;

class HotelAddressAdded extends AggregateChanged
{

    public function address(): Address
    {
        return $this->payload()['address'];
    }

}
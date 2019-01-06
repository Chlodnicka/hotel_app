<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:10
 */

namespace HotelApp\Domain\Model\Event\Hotel;

use Prooph\EventSourcing\AggregateChanged;

class HotelCreated extends AggregateChanged
{

    public function name(): string
    {
        return $this->payload()['name'];
    }


}
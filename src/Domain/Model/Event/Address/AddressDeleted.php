<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:09
 */

namespace HotelApp\Domain\Model\Event\Address;


use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;
use Prooph\EventSourcing\AggregateChanged;

class AddressDeleted extends AggregateChanged
{
    public function id(): string
    {
        return $this->payload()['id'];
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:02
 */

namespace HotelApp\Domain\Model\Event\Address;

use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;
use Prooph\EventSourcing\AggregateChanged;

class AddressCreated extends AggregateChanged
{

    public function street(): string
    {
        return $this->payload()['street'];
    }

    public function buildingNumber(): string
    {
        return $this->payload()['buildingNumber'];
    }

    public function flatNumber(): string
    {
        return $this->payload()['flatNumber'];
    }

    public function postalCode(): string
    {
        return $this->payload()['postalCode'];
    }

    public function city(): string
    {
        return $this->payload()['city'];
    }
}
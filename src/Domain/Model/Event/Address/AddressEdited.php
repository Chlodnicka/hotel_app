<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 04.01.2019
 * Time: 19:15
 */

namespace HotelApp\Domain\Model\Event\Address;


use Prooph\EventSourcing\AggregateChanged;

class AddressEdited extends AggregateChanged
{
    public function street(): string
    {
        return $this->payload()['street'];
    }

    public function buildingNumber(): string
    {
        return $this->payload()['buildingNumber'];
    }

    public function flatNumber(): ?string
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
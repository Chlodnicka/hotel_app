<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 18:32
 */

namespace HotelApp\Domain\Model;


use HotelApp\Domain\Model\Event\Address\AddressCreated;
use HotelApp\Domain\Model\Event\Address\AddressDeleted;
use HotelApp\Domain\Model\Event\Address\AddressEdited;
use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;

class Address extends AggregateRoot
{
    /** @var  int */
    private $id;

    /** @var  string */
    private $street;

    /** @var  string */
    private $buildingNumber;

    /** @var  string|null */
    private $flatNumber;

    /** @var  string */
    private $postalCode;

    /** @var  string */
    private $city;

    /** @var  \DateTime|null */
    private $deleted;

    static public function createWithData(string $id,
                                          string $street,
                                          string $buildingNumber,
                                          ?string $flatNumber,
                                          string $postalCode,
                                          string $city): self
    {
        $obj = new self;
        $obj->recordThat(AddressCreated::occur($id, [
            'street' => $street,
            'buildingNumber' => $buildingNumber,
            'flatNumber' => $flatNumber,
            'postalCode' => $postalCode,
            'city' => $city
        ]));

        return $obj;
    }

    protected function aggregateId(): string
    {
        return $this->id;
    }

    public function edit(
        string $street,
        string $buildingNumber,
        ?string $flatNumber,
        string $postalCode,
        string $city
    )
    {
        $addressData = [
            'street' => $street,
            'buildingNumber' => $buildingNumber,
            'flatNumber' => $flatNumber,
            'postalCode' => $postalCode,
            'city' => $city
        ];

        $this->hasAddressChanged($addressData);
        $this->recordThat(AddressEdited::occur($this->id, $addressData));
    }

    public function delete()
    {
        $this->recordThat(AddressDeleted::occur($this->id));
    }

    private function serialized()
    {
        return [
            'street' => $this->street,
            'buildingNumber' => $this->buildingNumber,
            'flatNumber' => $this->flatNumber,
            'postalCode' => $this->postalCode,
            'city' => $this->city
        ];
    }

    private function hasAddressChanged(array $newAddress)
    {
        if (!empty(array_diff($newAddress, $this->serialized()))) {
            return;
        }
    }

    protected function apply(AggregateChanged $event): void
    {
        switch (get_class($event)) {
            case AddressCreated::class:
                /** @var AddressCreated $event */
                $this->id = $event->aggregateId();
                $this->street = $event->street();
                $this->buildingNumber = $event->buildingNumber();
                $this->flatNumber = $event->flatNumber();
                $this->postalCode = $event->postalCode();
                $this->city = $event->city();
                break;
            case AddressEdited::class:
                /** @var AddressEdited $event */
                $this->id = $event->aggregateId();
                $this->street = $event->street();
                $this->buildingNumber = $event->buildingNumber();
                $this->flatNumber = $event->flatNumber();
                $this->postalCode = $event->postalCode();
                $this->city = $event->city();
                break;
            case AddressDeleted::class:
                /** @var AddressDeleted $event */
                $this->id = $event->aggregateId();
                $this->deleted = new \DateTime('now');
                break;
        }
    }
}
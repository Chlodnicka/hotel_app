<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 15.09.2018
 * Time: 16:44
 */

namespace HotelApp\Domain\Model;


use HotelApp\Domain\Model\Command\Hotel\HotelRoomAdded;
use HotelApp\Domain\Model\Event\Hotel\HotelAddressAdded;
use HotelApp\Domain\Model\Event\Hotel\HotelCreated;
use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;

class Hotel extends AggregateRoot
{
    /** @var  int */
    private $id;

    /** @var  int */
    private $name;

    /** @var  Address */
    private $address;

    /** @var  Company */
    private $company;

    /** @var  Room[] */
    private $rooms;

    static public function createWithData(string $id, string $name): self
    {
        $obj = new self;
        $obj->recordThat(HotelCreated::occur($id, [
            'name' => $name
        ]));

        return $obj;
    }

    protected function aggregateId(): string
    {
        return $this->id;
    }

    public function addAddress(Address $address)
    {
        $this->recordThat(HotelAddressAdded::occur($this->id, [
            'address' => $address
        ]));
    }

    public function addRoom(Room $room)
    {
        $this->recordThat(HotelRoomAdded::occur($this->id, [
            'room' => $room
        ]));
    }

    protected function apply(AggregateChanged $event): void
    {
        switch (get_class($event)) {
            case HotelCreated::class:
                /** @var HotelCreated $event */
                $this->id = $event->aggregateId();
                $this->name = $event->name();
                break;
            case HotelAddressAdded::class:
                /** @var HotelAddressAdded $event */
                $this->address = $event->address();
                break;
            case HotelRoomAdded::class:
                /** @var HotelRoomAdded $event */
                $this->rooms[] = $event->room();
                break;
        }
    }


}
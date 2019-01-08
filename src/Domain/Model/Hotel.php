<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 15.09.2018
 * Time: 16:44
 */

namespace HotelApp\Domain\Model;


use HotelApp\Domain\Model\Event\Hotel\HotelRoomAdded;
use HotelApp\Domain\Model\Event\Hotel\HotelAddressAdded;
use HotelApp\Domain\Model\Event\Hotel\HotelCreated;
use HotelApp\Domain\Model\Event\Hotel\HotelEmployeeAdded;
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

    /** @var  User[] */
    private $employees;

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

    public function addEmployee(User $employee)
    {
        $this->recordThat(HotelEmployeeAdded::occur($this->id, [
            'employee' => $employee
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
            case HotelEmployeeAdded::class:
                /** @var HotelEmployeeAdded $event */
                $this->employees[] = $event->employee();
                break;
            case HotelRoomAdded::class:
                /** @var HotelRoomAdded $event */
                $this->rooms[] = $event->room();
                break;
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getName(): int
    {
        return $this->name;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @return Company
     */
    public function getCompany(): Company
    {
        return $this->company;
    }

    /**
     * @return Room[]
     */
    public function getRooms(): array
    {
        return $this->rooms;
    }

    /**
     * @return User[]
     */
    public function getEmployees(): array
    {
        return $this->employees;
    }

}
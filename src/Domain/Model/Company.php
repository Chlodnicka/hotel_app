<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 15.09.2018
 * Time: 16:43
 */

namespace HotelApp\Domain\Model;

use HotelApp\Domain\Model\Command\Hotel\HotelCreated;
use HotelApp\Domain\Model\Event\Company\CompanyAddressAdded;
use HotelApp\Domain\Model\Event\Company\CompanyCreated;
use HotelApp\Domain\Model\Event\Company\CompanyEmployeeAdded;
use HotelApp\Domain\Model\Event\Company\CompanyHotelAdded;
use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;

class Company extends AggregateRoot
{
    /** @var  int */
    private $id;

    /** @var  string */
    private $name;

    /** @var  Address */
    private $address;

    /** @var  Hotel[] */
    private $hotels;

    /** @var  User */
    private $owner;

    /** @var  User[] */
    private $employees;

    static public function createWithData(string $id, string $name, User $user): self
    {
        $obj = new self;
        $obj->recordThat(CompanyCreated::occur($id, [
            'name' => $name,
            'owner' => $user
        ]));

        return $obj;
    }

    protected function aggregateId(): string
    {
        return $this->id;
    }

    public function addEmployee(User $employee)
    {
        $this->recordThat(CompanyEmployeeAdded::occur($this->id, [
            'employee' => $employee
        ]));
    }

    public function addAddress(Address $address)
    {
        $this->recordThat(CompanyAddressAdded::occur($this->id, [
            'address' => $address
        ]));
    }

    public function addHotel(Hotel $hotel)
    {
        $this->recordThat(CompanyHotelAdded::occur($this->id, [
            'hotel' => $hotel
        ]));
    }

    protected function apply(AggregateChanged $event): void
    {
        switch (get_class($event)) {
            case CompanyCreated::class:
                /** @var CompanyCreated $event */
                $this->id = $event->aggregateId();
                $this->name = $event->name();
                $this->owner = $event->owner();
                break;
            case CompanyEmployeeAdded::class:
                /** @var CompanyEmployeeAdded $event */
                $this->id = $event->aggregateId();
                $this->employees[] = $event->employee();
                break;
            case CompanyAddressAdded::class:
                /** @var CompanyAddressAdded $event */
                $this->id = $event->aggregateId();
                $this->address = $event->address();
                break;
            case CompanyHotelAdded::class:
                /** @var CompanyHotelAdded $event */
                $this->id = $event->aggregateId();
                $this->hotels[] = $event->hotel();
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
     * @return string
     */
    public function getName(): string
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
     * @return Hotel[]
     */
    public function getHotels(): array
    {
        return $this->hotels;
    }

    /**
     * @return User
     */
    public function getOwner(): User
    {
        return $this->owner;
    }

    /**
     * @return User[]
     */
    public function getEmployees(): array
    {
        return $this->employees;
    }

}
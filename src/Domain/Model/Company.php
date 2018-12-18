<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 15.09.2018
 * Time: 16:43
 */

namespace HotelApp\Domain\Model;

use HotelApp\Domain\Model\Command\Company\CompanyCreated;
use HotelApp\Domain\Model\Command\Company\CompanyEmployeeAdded;
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
                $this->employees[] = $event->user();
                break;
        }
    }


}
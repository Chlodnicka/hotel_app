<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 18:29
 */

namespace HotelApp\Domain\Model;


use HotelApp\Domain\Model\Event\Role\RoleCreated;
use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;

class Role extends AggregateRoot
{
    /** @var  int */
    private $id;

    /** @var  string */
    private $name;

    protected function aggregateId(): string
    {
        return $this->id;
    }

    static public function createWithData(string $id, string $name): self
    {
        $obj = new self;
        $obj->recordThat(RoleCreated::occur($id, [
            'name' => $name
        ]));

        return $obj;
    }

    protected function apply(AggregateChanged $event): void
    {
        switch (get_class($event)) {
            case RoleCreated::class:
                /** @var RoleCreated $event */
                $this->id = $event->aggregateId();
                $this->name = $event->name();
                break;
        }
    }


}
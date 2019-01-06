<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 15.09.2018
 * Time: 16:44
 */

namespace HotelApp\Domain\Model;


use HotelApp\Domain\Helper\StateMachine\RoomStates\Free;
use HotelApp\Domain\Helper\StateMachine\State;
use HotelApp\Domain\Model\Event\Room\RoomCreated;
use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;

class Room extends AggregateRoot
{
    /** @var  int */
    private $id;

    /** @var  int */
    private $number;

    /** @var  int|null */
    private $floor;

    /** @var  Hotel */
    private $hotel;

    /** @var  float */
    private $price;

    /** @var  int */
    private $capacity;

    /** @var State */
    private $status;

    static public function createWithData(string $id,
                                          int $number,
                                          int $capacity,
                                          float $price): self
    {
        $obj = new self;
        $obj->recordThat(RoomCreated::occur($id, [
            'number' => $number,
            'capacity' => $capacity,
            'price' => $price
        ]));

        return $obj;
    }

    protected function aggregateId(): string
    {
        return $this->aggregateId();
    }

    protected function apply(AggregateChanged $event): void
    {
        switch (get_class($event)) {
            case RoomCreated::class:
                /** @var RoomCreated $event */
                $this->id = $event->aggregateId();
                $this->number = $event->number();
                $this->capacity = $event->capacity();
                $this->price = $event->price();
                $this->status = new Free();
                break;
        }
    }


}
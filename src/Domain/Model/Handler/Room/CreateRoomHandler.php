<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:18
 */

namespace HotelApp\Domain\Model\Handler\Room;

use HotelApp\Domain\Model\Command\Room\CreateRoom;
use HotelApp\Domain\Model\Room;
use HotelApp\Infrastructure\Room\RoomRepository;

class CreateRoomHandler
{
    /** @var  RoomRepository */
    private $repository;

    /**
     * CreateRoomHandler constructor.
     * @param RoomRepository $repository
     */
    public function __construct(RoomRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateRoom $createRoom)
    {
        $room = Room::createWithData(
            $createRoom->id(),
            $createRoom->number(),
            $createRoom->capacity(),
            $createRoom->price()
        );
        $this->repository->save($room);
    }
}
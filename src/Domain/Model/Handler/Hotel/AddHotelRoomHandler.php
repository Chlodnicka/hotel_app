<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:20
 */

namespace HotelApp\Domain\Model\Handler\Hotel;


use HotelApp\Domain\Model\Command\Hotel\AddHotelRoom;
use HotelApp\Infrastructure\Hotel\HotelRepository;
use HotelApp\Infrastructure\Room\RoomRepository;
use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

class AddHotelRoomHandler
{
    /** @var  HotelRepository */
    private $repository;

    /** @var  RoomRepository */
    private $roomRepository;

    /**
     * AddHotelRoomHandler constructor.
     * @param HotelRepository $repository
     * @param RoomRepository $roomRepository
     */
    public function __construct(HotelRepository $repository, RoomRepository $roomRepository)
    {
        $this->repository = $repository;
        $this->roomRepository = $roomRepository;
    }


    public function __invoke(AddHotelRoom $addHotelRoom)
    {
        $hotel = $this->repository->load($addHotelRoom->id());
        $room = $this->roomRepository->load($addHotelRoom->roomId());
        if ($hotel && $room) {
            $hotel->addRoom($room);
            $this->repository->save($hotel);
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 15.09.2018
 * Time: 16:30
 */

namespace HotelApp\Domain\Event;

/**
 * Class CheckedRoomReservations
 * @package HotelApp\Domain\Event
 */
class CheckedRoomReservations implements Event
{
    /**
     * @var int
     */
    private $roomId;

    /**
     * CheckedRoomReservations constructor.
     * @param int $roomId
     */
    public function __construct($roomId)
    {
        $this->roomId = $roomId;
    }

    /**
     * @return int
     */
    public function getRoomId(): int
    {
        return $this->roomId;
    }

}
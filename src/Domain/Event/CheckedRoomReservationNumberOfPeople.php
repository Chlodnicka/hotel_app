<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 15.09.2018
 * Time: 16:29
 */

namespace HotelApp\Domain\Event;

/**
 * Class CheckedRoomReservationNumberOfPeople
 * @package HotelApp\Domain\Event
 */
class CheckedRoomReservationNumberOfPeople implements Event
{
    /**
     * @var int
     */
    private $roomId;

    /**
     * @var int
     */
    private $numberOfPeople;

    /**
     * CheckedRoomReservationNumberOfPeople constructor.
     * @param int $roomId
     * @param int $numberOfPeople
     */
    public function __construct(int $roomId, int $numberOfPeople)
    {
        $this->roomId = $roomId;
        $this->numberOfPeople = $numberOfPeople;
    }

    /**
     * @return int
     */
    public function getRoomId(): int
    {
        return $this->roomId;
    }

    /**
     * @return int
     */
    public function getNumberOfPeople(): int
    {
        return $this->numberOfPeople;
    }

}
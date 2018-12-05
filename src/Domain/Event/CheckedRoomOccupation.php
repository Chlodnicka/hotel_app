<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 15.09.2018
 * Time: 16:31
 */

namespace HotelApp\Domain\Event;

/**
 * Class CheckedRoomOccupation
 * @package HotelApp\Domain\Event
 */
class CheckedRoomOccupation implements Event
{
    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var int
     */
    private $roomId;

    /**
     * CheckedRoomOccupation constructor.
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @param int $roomId
     */
    public function __construct(\DateTime $startDate, \DateTime $endDate, $roomId)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->roomId = $roomId;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate(): \DateTime
    {
        return $this->startDate;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate(): \DateTime
    {
        return $this->endDate;
    }

    /**
     * @return int
     */
    public function getRoomId(): int
    {
        return $this->roomId;
    }



}
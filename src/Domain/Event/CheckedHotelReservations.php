<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 15.09.2018
 * Time: 16:27
 */

namespace HotelApp\Domain\Event;

/**
 * Class CheckedHotelReservations
 * @package HotelApp\Domain\Event
 */
class CheckedHotelReservations implements Event
{

    /**
     * @var int
     */
    private $hotelId;

    /**
     * CheckedHotelReservations constructor.
     * @param int $hotelIdK
     */
    public function __construct(int $hotelId)
    {
        $this->hotelId = $hotelId;
    }

    /**
     * @return int
     */
    public function getHotelId(): int
    {
        return $this->hotelId;
    }

}
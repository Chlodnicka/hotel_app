<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 15.09.2018
 * Time: 16:25
 */

namespace HotelApp\Domain\Event;

class HotelAdded implements Event
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $addressId;

    /**
     * @var int
     */
    private $ownerId;

    /**
     * HotelAdded constructor.
     * @param string $name
     * @param int $addressId
     * @param int $ownerId
     */
    public function __construct(string $name, int $addressId, int $ownerId)
    {
        $this->name = $name;
        $this->addressId = $addressId;
        $this->ownerId = $ownerId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAddressId(): int
    {
        return $this->addressId;
    }

    /**
     * @return int
     */
    public function getOwnerId(): int
    {
        return $this->ownerId;
    }

}
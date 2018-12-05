<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 15.09.2018
 * Time: 16:25
 */

namespace HotelApp\Domain\Event;

/**
 * Class CompanyAdded
 * @package HotelApp\Domain\Event
 */
class CompanyAdded implements Event
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $ownerId;

    /**
     * CompanyAdded constructor.
     * @param string $name
     * @param int $ownerId
     */
    public function __construct(string $name, int $ownerId)
    {
        $this->name = $name;
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
    public function getOwnerId(): int
    {
        return $this->ownerId;
    }


}
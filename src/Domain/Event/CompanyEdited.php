<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 15.09.2018
 * Time: 16:25
 */

namespace HotelApp\Domain\Event;

/**
 * Class CompanyEdited
 * @package HotelApp\Domain\Event
 */
class CompanyEdited implements Event
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
     * @var string
     */
    private $nip;

    /**
     * CompanyEdited constructor.
     * @param string $name
     * @param int $addressId
     * @param string $nip
     */
    public function __construct(string $name, int $addressId, string $nip)
    {
        $this->name = $name;
        $this->addressId = $addressId;
        $this->nip = $nip;
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
     * @return string
     */
    public function getNip(): string
    {
        return $this->nip;
    }

}
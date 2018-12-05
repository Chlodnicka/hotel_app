<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 15.09.2018
 * Time: 16:22
 */

namespace HotelApp\Domain\Event;

/**
 * Class EmployeeAdded
 * @package HotelApp\Domain\Event
 */
class EmployeeAdded implements Event
{

    /**
     * @var int
     */
    private $userId;

    /**
     * @var int
     */
    private $companyId;

    /**
     * EmployeeAdded constructor.
     * @param int $userId
     * @param int $companyId
     */
    public function __construct(int $userId, int $companyId)
    {
        $this->userId = $userId;
        $this->companyId = $companyId;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getCompanyId(): int
    {
        return $this->companyId;
    }


}
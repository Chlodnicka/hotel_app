<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:05
 */

namespace HotelApp\Domain\Model\Event\Company;


use HotelApp\Domain\Model\User;
use Prooph\EventSourcing\AggregateChanged;

class CompanyEmployeeAdded extends AggregateChanged
{
    public function employee(): User
    {
        return $this->payload()['employee'];
    }

}
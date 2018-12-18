<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:05
 */

namespace HotelApp\Domain\Model\Command\Company;


use Prooph\EventSourcing\AggregateChanged;

class CompanyEmployeeAdded extends AggregateChanged
{
    public function user(): string
    {
        return $this->payload()['user'];
    }

}
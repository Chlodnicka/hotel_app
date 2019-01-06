<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:01
 */

namespace HotelApp\Domain\Model\Event\Company;


use HotelApp\Domain\Model\Address;
use Prooph\EventSourcing\AggregateChanged;

class CompanyAddressAdded extends AggregateChanged
{

    public function address(): Address
    {
        return $this->payload()['address'];
    }
}
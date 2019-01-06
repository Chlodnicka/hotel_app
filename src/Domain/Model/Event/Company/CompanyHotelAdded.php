<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.01.2019
 * Time: 16:19
 */

namespace HotelApp\Domain\Model\Event\Company;


use HotelApp\Domain\Model\Hotel;
use Prooph\EventSourcing\AggregateChanged;

class CompanyHotelAdded extends AggregateChanged
{
    public function hotel(): Hotel
    {
        return $this->payload()['hotel'];
    }

}
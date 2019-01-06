<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 16:59
 */

namespace HotelApp\Domain\Model\Event\Company;

use HotelApp\Domain\Model\User;
use Prooph\EventSourcing\AggregateChanged;

class CompanyCreated extends AggregateChanged
{
    public function name(): string
    {
        return $this->payload()['name'];
    }

    public function owner(): User
    {
        return $this->payload()['owner'];
    }
}
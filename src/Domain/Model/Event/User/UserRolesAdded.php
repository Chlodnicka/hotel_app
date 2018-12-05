<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 20:43
 */

namespace HotelApp\Domain\Model\Event\User;

use Prooph\EventSourcing\AggregateChanged;

class UserRolesAdded extends AggregateChanged
{
    public function roles(): array
    {
        return $this->payload()['roles'];
    }
}
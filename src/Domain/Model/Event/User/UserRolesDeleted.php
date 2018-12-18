<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 18.12.2018
 * Time: 19:30
 */

namespace HotelApp\Domain\Model\Event\User;


use Prooph\EventSourcing\AggregateChanged;

class UserRolesDeleted extends AggregateChanged
{
    public function roles(): array
    {
        return $this->payload()['roles'];
    }
}
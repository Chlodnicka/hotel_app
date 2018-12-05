<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 19:44
 */

namespace HotelApp\Domain\Model\Event\User;

use Prooph\EventSourcing\AggregateChanged;

class UserRegistered extends AggregateChanged
{
    public function email(): string {
        return $this->payload()['email'];
    }

    public function password(): string {
        return $this->payload()['password'];
    }
}
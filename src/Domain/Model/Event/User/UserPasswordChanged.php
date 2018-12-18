<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 18.12.2018
 * Time: 19:34
 */

namespace HotelApp\Domain\Model\Event\User;


use Prooph\EventSourcing\AggregateChanged;

class UserPasswordChanged extends AggregateChanged
{

    public function password(): string
    {
        return $this->payload()['password'];
    }
}
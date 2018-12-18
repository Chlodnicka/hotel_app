<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 18.12.2018
 * Time: 19:23
 */

namespace HotelApp\Domain\Model\Event\User;


use Prooph\EventSourcing\AggregateChanged;

class UserEdited extends AggregateChanged
{

    public function firstName(): string
    {
        return $this->payload()['firstName'];
    }

    public function lastName(): string
    {
        return $this->payload()['lastName'];
    }
}
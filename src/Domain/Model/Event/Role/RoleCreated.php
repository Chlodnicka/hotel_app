<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 20:32
 */

namespace HotelApp\Domain\Model\Event\Role;

use Prooph\EventSourcing\AggregateChanged;

class RoleCreated extends AggregateChanged
{
    public function name(): string
    {
        return $this->payload()['name'];
    }
}
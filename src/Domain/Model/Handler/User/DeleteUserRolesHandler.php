<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 20:19
 */

namespace HotelApp\Domain\Model\Command\User;


use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

class DeleteUserRolesHandler extends Command
{

    use PayloadTrait;

    public function id(): string
    {
        return $this->payload()['id'];
    }

    public function roles(): array
    {
        return $this->payload()['roles'];
    }

}
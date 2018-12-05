<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 19:24
 */

namespace HotelApp\Domain\Model\Command\User;

use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

class RegisterUser extends Command
{
    use PayloadTrait;

    public function id(): string
    {
        return $this->payload()['id'];
    }

    public function email(): string
    {
        return $this->payload()['email'];
    }

    public function password(): string
    {
        return $this->payload()['password'];
    }
}
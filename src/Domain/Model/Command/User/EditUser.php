<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 20:15
 */

namespace HotelApp\Domain\Model\Command\User;


use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

class EditUser extends Command
{
    use PayloadTrait;

    public function id(): string
    {
        return $this->payload()['id'];
    }

    public function firstName(): string
    {
        return $this->payload()['firstName'];
    }

    public function lastName(): string
    {
        return $this->payload()['lastName'];
    }
}
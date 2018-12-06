<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:34
 */

namespace HotelApp\Domain\Model\Command\Guest;

use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

class CreateGuestHandler extends Command
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

    public function phoneNumber(): string
    {
        return $this->payload()['phoneNumber'];
    }

    public function email(): string
    {
        return $this->payload()['email'];
    }

}
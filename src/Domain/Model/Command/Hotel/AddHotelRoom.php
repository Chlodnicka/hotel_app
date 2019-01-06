<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:20
 */

namespace HotelApp\Domain\Model\Command\Hotel;


use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

class AddHotelRoom extends Command
{
    use PayloadTrait;

    public function id(): string
    {
        return $this->payload()['id'];
    }

    public function roomId(): string
    {
        return $this->payload()['roomId'];
    }

}
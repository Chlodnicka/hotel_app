<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:18
 */

namespace HotelApp\Domain\Model\Command\Room;

use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

class CreateRoomHandler extends Command
{
    use PayloadTrait;

    public function id(): string
    {
        return $this->payload()['id'];
    }

    public function number(): string
    {
        return $this->payload()['number'];
    }

}
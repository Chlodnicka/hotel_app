<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:21
 */

namespace HotelApp\Domain\Model\Command\Room;


use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

class EditRoomHandler extends Command
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

    public function floor(): string
    {
        return $this->payload()['floor'];
    }

}
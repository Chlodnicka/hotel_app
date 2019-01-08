<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:15
 */

namespace HotelApp\Domain\Model\Command\Hotel;


use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

class AddHotelEmployee extends Command
{
    use PayloadTrait;

    public function id(): string
    {
        return $this->payload()['id'];
    }

    public function employeeId(): string
    {
        return $this->payload()['employeeId'];
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:04
 */

namespace HotelApp\Domain\Model\Command\Company;


use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

class AddHotelToCompanyHandler extends Command
{
    use PayloadTrait;

    public function id(): string
    {
        return $this->payload()['id'];
    }

    public function hotelId(): string
    {
        return $this->payload()['hotelId'];
    }
}
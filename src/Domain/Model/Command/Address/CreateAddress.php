<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 04.01.2019
 * Time: 19:20
 */

namespace HotelApp\Domain\Model\Command\Address;


use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

class CreateAddress extends Command
{
    use PayloadTrait;

    public function id(): string
    {
        return $this->payload()['id'];
    }

    public function street(): string
    {
        return $this->payload()['street'];
    }

    public function buildingNumber(): string
    {
        return $this->payload()['buildingNumber'];
    }

    public function flatNumber(): string
    {
        return $this->payload()['flatNumber'];
    }

    public function postalCode(): string
    {
        return $this->payload()['postalCode'];
    }

    public function city(): string
    {
        return $this->payload()['city'];
    }
}
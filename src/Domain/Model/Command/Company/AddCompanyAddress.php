<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:01
 */

namespace HotelApp\Domain\Model\Command\Company;


use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

class AddCompanyAddress extends Command
{
    use PayloadTrait;

    public function id(): string
    {
        return $this->payload()['id'];
    }

    public function addressId(): string
    {
        return $this->payload()['addressId'];
    }
}
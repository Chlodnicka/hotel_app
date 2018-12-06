<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:05
 */

namespace HotelApp\Domain\Model\Command\Company;


use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

class AddCompanyEmployeeHandler extends Command
{
    use PayloadTrait;

    public function id(): string
    {
        return $this->payload()['id'];
    }

    public function userId(): string
    {
        return $this->payload()['userId'];
    }

}
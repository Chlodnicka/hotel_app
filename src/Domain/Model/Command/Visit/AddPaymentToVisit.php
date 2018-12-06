<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:37
 */

namespace HotelApp\Domain\Model\Command\Visit;


use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

class AddPaymentToVisit extends Command
{
    use PayloadTrait;

    public function id(): string
    {
        return $this->payload()['id'];
    }

    public function visitId(): string
    {
        return $this->payload()['visitId'];
    }

    public function amount(): string
    {
        return $this->payload()['amount'];
    }

}
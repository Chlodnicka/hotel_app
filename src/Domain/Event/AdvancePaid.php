<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 15.09.2018
 * Time: 16:35
 */

namespace HotelApp\Domain\Event;


/**
 * Class AdvancePaid
 * @package HotelApp\Domain\Event
 */
class AdvancePaid implements Event
{
    /**
     * @var int
     */
    private $paymentId;

    /**
     * AdvancePaid constructor.
     * @param int $paymentId
     */
    public function __construct(int $paymentId)
    {
        $this->paymentId = $paymentId;
    }

    /**
     * @return int
     */
    public function getPaymentId(): int
    {
        return $this->paymentId;
    }

}
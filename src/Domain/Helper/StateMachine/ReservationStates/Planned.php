<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 19:26
 */

namespace HotelApp\Domain\Helper\StateMachine\ReservationStates;

use HotelApp\Domain\Helper\StateMachine\State;

class Planned extends State
{
    public function __construct()
    {
        parent::__construct();
        $this->next = [
            Canceled::class,
            Realised::class
        ];
    }
}
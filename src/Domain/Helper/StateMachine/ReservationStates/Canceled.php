<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 19:29
 */

namespace HotelApp\Domain\Helper\StateMachine\ReservationStates;


use HotelApp\Domain\Helper\StateMachine\State;

class Canceled extends State
{
    public function __construct()
    {
        parent::__construct();
        $this->previous = [
            Planned::class
        ];
    }
}
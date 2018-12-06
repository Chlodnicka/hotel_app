<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 19:45
 */

namespace HotelApp\Domain\Helper\StateMachine\RoomStates;

use HotelApp\Domain\Helper\StateMachine\State;

class Occupied extends State
{
    public function __construct()
    {
        parent::__construct();
        $this->previous = $this->next = [
            Free::class
        ];
    }
}
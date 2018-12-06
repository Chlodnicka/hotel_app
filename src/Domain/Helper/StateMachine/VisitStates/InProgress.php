<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 19:37
 */

namespace HotelApp\Domain\Helper\StateMachine\VisitStates;

use HotelApp\Domain\Helper\StateMachine\State;

class InProgress extends State
{
    public function __construct()
    {
        parent::__construct();
        $this->next = [
            Finished::class
        ];
    }
}
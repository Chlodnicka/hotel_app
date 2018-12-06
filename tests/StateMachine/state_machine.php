<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 19:47
 */

include realpath(__DIR__ . "/../../src/Domain/Helper/StateMachine/State.php");
include realpath(__DIR__ . "/../../src/Domain/Helper/StateMachine/ReservationStates/Canceled.php");
include realpath(__DIR__ . "/../../src/Domain/Helper/StateMachine/ReservationStates/Planned.php");
include realpath(__DIR__ . "/../../src/Domain/Helper/StateMachine/ReservationStates/Realised.php");
include realpath(__DIR__ . "/../../src/Domain/Helper/StateMachine/RoomStates/Free.php");
include realpath(__DIR__ . "/../../src/Domain/Helper/StateMachine/RoomStates/Occupied.php");
include realpath(__DIR__ . "/../../src/Domain/Helper/StateMachine/VisitStates/Finished.php");
include realpath(__DIR__ . "/../../src/Domain/Helper/StateMachine/VisitStates/InProgress.php");

use HotelApp\Domain\Helper\StateMachine\ReservationStates\Planned;


$reservationState = new Planned();
var_dump(get_class($reservationState));
$reservationState = $reservationState->next();
var_dump(get_class($reservationState));

$reservationState = new Planned();
var_dump(get_class($reservationState));
$reservationState = $reservationState->next(\HotelApp\Domain\Helper\StateMachine\ReservationStates\Realised::class);
var_dump(get_class($reservationState));


$visitState = new \HotelApp\Domain\Helper\StateMachine\VisitStates\InProgress();

var_dump(get_class($visitState));
$visitState = $visitState->next();
var_dump(get_class($visitState));

$visitState = new \HotelApp\Domain\Helper\StateMachine\VisitStates\Finished();
var_dump(get_class($visitState));
$visitState = $visitState->previous();
var_dump(get_class($visitState));


$roomState = new \HotelApp\Domain\Helper\StateMachine\RoomStates\Free();

var_dump(get_class($roomState));
$roomState = $roomState->next();
var_dump(get_class($roomState));
$roomState = $roomState->next();
var_dump(get_class($roomState));

$roomState = $roomState->next();
var_dump(get_class($roomState));

$roomState = $roomState->previous();
var_dump(get_class($roomState));

$roomState = $roomState->previous();
var_dump(get_class($roomState));

$roomState = $roomState->previous();
var_dump(get_class($roomState));




<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 18:36
 */

namespace HotelApp\Infrastructure;


use HotelApp\Domain\Model\Reservation;

interface ReservationInterface
{
    public function load(string $id):?Reservation;

    public function save(Reservation $reservation): void;
}
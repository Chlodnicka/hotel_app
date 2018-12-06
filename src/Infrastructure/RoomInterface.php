<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 18:36
 */

namespace HotelApp\Infrastructure;


use HotelApp\Domain\Model\Room;

interface RoomInterface
{
    public function load(string $id):?Room;

    public function save(Room $room): void;
}
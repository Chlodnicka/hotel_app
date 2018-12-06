<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 18:34
 */

namespace HotelApp\Infrastructure;


use HotelApp\Domain\Model\Guest;

interface GuestInterface
{
    public function load(string $id):?Guest;

    public function save(Guest $guest): void;
}
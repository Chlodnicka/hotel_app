<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 18:31
 */

namespace HotelApp\Infrastructure;


use HotelApp\Domain\Model\Address;

interface AddressInterface
{
    public function load(string $id):?Address;

    public function save(Address $address): void;
}
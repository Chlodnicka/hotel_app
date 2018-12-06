<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 18:34
 */

namespace HotelApp\Infrastructure;


use HotelApp\Domain\Model\Hotel;

interface HotelInterface
{
    public function load(string $id):?Hotel;

    public function save(Hotel $hotel): void;

}
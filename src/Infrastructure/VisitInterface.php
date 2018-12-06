<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 18:37
 */

namespace HotelApp\Infrastructure;


use HotelApp\Domain\Model\Visit;

interface VisitInterface
{
    public function load(string $id):?Visit;

    public function save(Visit $visit): void;
}
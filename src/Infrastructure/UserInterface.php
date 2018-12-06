<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 19:40
 */

namespace HotelApp\Infrastructure;


use HotelApp\Domain\Model\User;

interface UserInterface
{
    public function load(string $id):?User;

    public function save(User $user): void;
}
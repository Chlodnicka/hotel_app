<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 20:22
 */

namespace HotelApp\Infrastructure;


use HotelApp\Domain\Model\Role;

interface RoleInterface
{

    public function load(string $id):?Role;

    public function save(Role $role): void;

}
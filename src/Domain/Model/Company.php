<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 15.09.2018
 * Time: 16:43
 */

namespace HotelApp\Domain\Model;

class Company
{
    /** @var  int */
    private $id;

    /** @var  string */
    private $name;

    /** @var  Address */
    private $address;

    /** @var  Hotel[] */
    private $hotels;

    /** @var  User */
    private $owner;

    /** @var  User[] */
    private $employees;

}
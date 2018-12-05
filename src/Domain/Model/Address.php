<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 18:32
 */

namespace HotelApp\Domain\Model;


class Address
{
    /** @var  int */
    private $id;

    /** @var  string */
    private $street;

    /** @var  string */
    private $buildingNumber;

    /** @var  string */
    private $flatNumber;

    /** @var  string */
    private $postalCode;

    /** @var  string */
    private $city;
}
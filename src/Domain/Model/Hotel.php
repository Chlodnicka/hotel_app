<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 15.09.2018
 * Time: 16:44
 */

namespace HotelApp\Domain\Model;


class Hotel
{
    /** @var  int */
    private $id;

    /** @var  int */
    private $name;

    /** @var  Address */
    private $address;

    /** @var  Company */
    private $company;

    /** @var  Room[] */
    private $rooms;

}
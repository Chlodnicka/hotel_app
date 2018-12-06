<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 15.09.2018
 * Time: 16:44
 */

namespace HotelApp\Domain\Model;


class Room
{
    /** @var  int */
    private $id;

    /** @var  int */
    private $number;

    /** @var  int|null */
    private $floor;

    /** @var  Hotel */
    private $hotel;

    /** @var  int */
    private $capacity;

    /** @var */ //can be free/occupied (now)
    private $status; //? todo
}
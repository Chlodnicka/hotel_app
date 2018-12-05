<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 15.09.2018
 * Time: 16:26
 */

namespace HotelApp\Domain\Event;

class HotelEdited implements Event
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $addressId;


}
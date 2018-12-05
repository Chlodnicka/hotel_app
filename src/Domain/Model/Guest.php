<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 15.09.2018
 * Time: 16:45
 */

namespace HotelApp\Domain\Model;


class Guest
{
    /** @var  int */
    private $id;

    /** @var  string */
    private $firstname;

    /** @var  string */
    private $lastname;

    /** @var  string */
    private $email;

    /** @var  string */
    private $phoneNumber;

    /** @var  Reservation[] */
    private $reservations;

    /** @var   */
    private $visits;
}
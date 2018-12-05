<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 19:54
 */

namespace {

    use HotelApp\Domain\Model\Command\User\RegisterUser;

    include "../../config.php";

    $commandBus->dispatch(new RegisterUser([
        'id' => $userId,
        'email' => 'random@email.com',
        'password' => 'test'
    ]));
}
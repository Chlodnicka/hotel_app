<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 19:54
 */

namespace {

    use HotelApp\Domain\Model\Command\Role\CreateRole;
    use HotelApp\Domain\Model\Command\User\AddUserRoles;
    use HotelApp\Domain\Model\Command\User\RegisterUser;

    include "config.php";

    $roleId = '1';
    $userId = '20';

    $commandBus->dispatch(new CreateRole([
        'id' => $roleId,
        'name' => 'OWNER'
    ]));

    $role = $roleRepository->load($roleId);
    var_dump($role);

    $commandBus->dispatch(new RegisterUser([
        'id' => $userId,
        'email' => 'random@email.com',
        'password' => 'test'
    ]));

    $commandBus->dispatch(new AddUserRoles([
        'id' => $userId,
        'roles' => [$role]
    ]));

    var_dump($userRepository->load($userId));
}
<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 19:54
 */

namespace {

    use Config\CommandRouterConfig;
    use HotelApp\Domain\Model\Command\Company\AddCompanyOwner;
    use HotelApp\Domain\Model\Command\Company\CreateCompany;
    use HotelApp\Domain\Model\Command\Role\CreateRole;
    use HotelApp\Domain\Model\Command\User\AddUserRoles;
    use HotelApp\Domain\Model\Command\User\RegisterUser;
    use Prooph\ServiceBus\CommandBus;

    include realpath(__DIR__ . "/../../config.php");

    $roleId = '1';
    $userId = '20';
    /** @var $commandBus CommandBus */
    $commandBus->dispatch(new CreateRole([
        'id' => $roleId,
        'name' => 'OWNER'
    ]));

    /** @var  $router CommandRouterConfig */
    $role = $router->getRoleRepository()->load($roleId);
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

    var_dump($router->getUserRepository()->load($userId));

    $companyId = '1';

    $commandBus->dispatch(new CreateCompany([
        'id' => $companyId,
        'name' => 'Test sp. z o.o.'
    ]));

    $commandBus->dispatch(new AddCompanyOwner([
        'id' => $companyId,
        'userId' => $userId
    ]));
}
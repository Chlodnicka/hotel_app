<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 19:54
 */

namespace {

    use Config\CommandRouterConfig;
    use HotelApp\Domain\Model\Command\Address\CreateAddress;
    use HotelApp\Domain\Model\Command\Company\AddCompanyAddress;
    use HotelApp\Domain\Model\Command\Company\AddCompanyEmployee;
    use HotelApp\Domain\Model\Command\Company\CreateCompany;
    use HotelApp\Domain\Model\Command\Role\CreateRole;
    use HotelApp\Domain\Model\Command\User\AddUserRoles;
    use HotelApp\Domain\Model\Command\User\RegisterUser;
    use Prooph\ServiceBus\CommandBus;

    include realpath(__DIR__ . "/../../config.php");

    $roleId = '1';
    $roleEmployeeId = '2';

    $userId = '20';
    $userEmployee = '21';
    $userEmployee2 = '22';

    /** @var $commandBus CommandBus */
    $commandBus->dispatch(new CreateRole([
        'id' => $roleId,
        'name' => 'OWNER'
    ]));

    /** @var $commandBus CommandBus */
    $commandBus->dispatch(new CreateRole([
        'id' => $roleEmployeeId,
        'name' => 'EMPLOYEE'
    ]));

    /** @var  $router CommandRouterConfig */
    $role = $router->getRoleRepository()->load($roleId);
    $roleEmployee = $router->getRoleRepository()->load($roleEmployeeId);

    $commandBus->dispatch(new RegisterUser([
        'id' => $userId,
        'email' => 'random@email.com',
        'password' => 'test'
    ]));

    $commandBus->dispatch(new AddUserRoles([
        'id' => $userId,
        'roles' => [$role]
    ]));

    $commandBus->dispatch(new RegisterUser([
        'id' => $userEmployee,
        'email' => 'random1@email.com',
        'password' => 'test1'
    ]));

    $commandBus->dispatch(new AddUserRoles([
        'id' => $userEmployee,
        'roles' => [$roleEmployee]
    ]));

    $commandBus->dispatch(new RegisterUser([
        'id' => $userEmployee2,
        'email' => 'random2@email.com',
        'password' => 'test2'
    ]));

    $commandBus->dispatch(new AddUserRoles([
        'id' => $userEmployee2,
        'roles' => [$roleEmployee]
    ]));

    $companyId = '1';

    $commandBus->dispatch(new CreateCompany([
        'id' => $companyId,
        'name' => 'Test sp. z o.o.',
        'ownerId' => $userId
    ]));

    $addressId = '1';

    $commandBus->dispatch(new CreateAddress([
        'id' => $addressId,
        'street' => 'Nowa',
        'buildingNumber' => '11',
        'flatNumber' => '1',
        'postalCode' => '12-111',
        'city' => 'Test'
    ]));

    $commandBus->dispatch(new AddCompanyAddress([
        'id' => $companyId,
        'addressId' => $addressId
    ]));

    $commandBus->dispatch(new AddCompanyEmployee([
        'id' => $companyId,
        'userId' => $userEmployee
    ]));

    $commandBus->dispatch(new AddCompanyEmployee([
        'id' => $companyId,
        'userId' => $userEmployee2
    ]));

    //change company address

    //create hotel

    //create hotel2

    //add hotels to company

    //add employee1 to hotel1

    //add employee2 to hotel1 and hotel2

    //create room1, room2, room3, room4

    //add room1 and room2 to hotel1

    //add room3 and room4 to hotel2

}
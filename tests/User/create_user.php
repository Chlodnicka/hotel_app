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
    use HotelApp\Domain\Model\Command\Address\EditAddress;
    use HotelApp\Domain\Model\Command\Company\AddCompanyAddress;
    use HotelApp\Domain\Model\Command\Company\AddCompanyEmployee;
    use HotelApp\Domain\Model\Command\Company\AddHotelToCompany;
    use HotelApp\Domain\Model\Command\Company\CreateCompany;
    use HotelApp\Domain\Model\Command\Hotel\AddHotelAddress;
    use HotelApp\Domain\Model\Command\Hotel\AddHotelEmployee;
    use HotelApp\Domain\Model\Command\Hotel\AddHotelRoom;
    use HotelApp\Domain\Model\Command\Hotel\CreateHotel;
    use HotelApp\Domain\Model\Command\Role\CreateRole;
    use HotelApp\Domain\Model\Command\Room\CreateRoom;
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

    $commandBus->dispatch(new EditAddress([
        'id' => $addressId,
        'street' => 'Nowsza',
        'buildingNumber' => '11',
        'flatNumber' => '1',
        'postalCode' => '12-111',
        'city' => 'Test'
    ]));

    $hotelId = '1';
    $hotelId2 = '2';

    $commandBus->dispatch(new CreateHotel([
        'id' => $hotelId,
        'name' => 'Hotel1'
    ]));

    $commandBus->dispatch(new CreateHotel([
        'id' => $hotelId2,
        'name' => 'Hotel2'
    ]));

    $commandBus->dispatch(new AddHotelToCompany([
        'id' => $companyId,
        'hotelId' => $hotelId
    ]));

    $commandBus->dispatch(new AddHotelToCompany([
        'id' => $companyId,
        'hotelId' => $hotelId2
    ]));

    $commandBus->dispatch(new AddHotelAddress([
        'id' => $hotelId,
        'addressId' => $addressId
    ]));

    $addressId2 = '2';

    $commandBus->dispatch(new CreateAddress([
        'id' => $addressId2,
        'street' => 'Testowa hotelowa',
        'buildingNumber' => '2',
        'flatNumber' => null,
        'postalCode' => '12-543',
        'city' => 'Test'
    ]));

    $commandBus->dispatch(new AddHotelAddress([
        'id' => $hotelId2,
        'addressId' => $addressId2
    ]));

    $commandBus->dispatch(new AddHotelEmployee([
        'id' => $hotelId,
        'employeeId' => $userEmployee
    ]));

    $commandBus->dispatch(new AddHotelEmployee([
        'id' => $hotelId,
        'employeeId' => $userEmployee2
    ]));

    $commandBus->dispatch(new AddHotelEmployee([
        'id' => $hotelId2,
        'employeeId' => $userEmployee
    ]));

    $roomIds = ['1', '2', '3', '4', '5', '6', '7'];
    foreach ($roomIds as $roomId) {
        $commandBus->dispatch(new CreateRoom([
            'id' => $roomId,
            'number' => rand(1, 8),
            'capacity' => rand(2, 5),
            'price' => rand(80, 300)
        ]));
        $commandBus->dispatch(new AddHotelRoom([
            'id' => (string)rand(1, 2),
            'roomId' => $roomId
        ]));
    }

}
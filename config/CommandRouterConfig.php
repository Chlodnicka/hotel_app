<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:55
 */

namespace Config;

use HotelApp\Domain\Model\Command\Address\CreateAddress;
use HotelApp\Domain\Model\Command\Address\DeleteAddress;
use HotelApp\Domain\Model\Command\Address\EditAddress;
use HotelApp\Domain\Model\Command\Company\AddCompanyAddress;
use HotelApp\Domain\Model\Command\Company\AddCompanyEmployee;
use HotelApp\Domain\Model\Command\Company\CreateCompany;
use HotelApp\Domain\Model\Command\Role\CreateRole;
use HotelApp\Domain\Model\Command\User\AddUserRoles;
use HotelApp\Domain\Model\Command\User\RegisterUser;
use HotelApp\Domain\Model\Handler\Address\CreateAddressHandler;
use HotelApp\Domain\Model\Handler\Address\DeleteAddressHandler;
use HotelApp\Domain\Model\Handler\Address\EditAddressHandler;
use HotelApp\Domain\Model\Handler\Company\AddCompanyAddressHandler;
use HotelApp\Domain\Model\Handler\Company\AddCompanyEmployeeHandler;
use HotelApp\Domain\Model\Handler\Company\CreateCompanyHandler;
use HotelApp\Domain\Model\Handler\Role\CreateRoleHandler;
use HotelApp\Domain\Model\Handler\User\AddUserRolesHandler;
use HotelApp\Domain\Model\Handler\User\RegisterUserHandler;
use HotelApp\Infrastructure\Company\CompanyRepository;
use HotelApp\Infrastructure\Role\RoleRepository;
use HotelApp\Infrastructure\Address\AddressRepository;
use HotelApp\Infrastructure\User\UserRepository;
use Prooph\EventStore\EventStore;
use Prooph\ServiceBus\CommandBus;
use Prooph\ServiceBus\Plugin\Router\CommandRouter;
use Prooph\SnapshotStore\SnapshotStore;

class CommandRouterConfig
{
    /** @var UserRepository */
    private $userRepository;

    /** @var  RoleRepository */
    private $roleRepository;

    /** @var AddressRepository */
    private $addressRepository;

    /** @var CompanyRepository */
    private $companyRepository;

    private $commandBus;

    public function __construct(EventStore $eventStore, SnapshotStore $snapshotStore, CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
        $this->userRepository = new UserRepository($eventStore, $snapshotStore);
        $this->roleRepository = new RoleRepository($eventStore, $snapshotStore);
        $this->addressRepository = new AddressRepository($eventStore, $snapshotStore);
        $this->companyRepository = new CompanyRepository($eventStore, $snapshotStore);
    }

    public function get()
    {
        $router = new CommandRouter();
        /** User */
        $router->route(RegisterUser::class)->to(new RegisterUserHandler($this->userRepository));
        $router->route(CreateRole::class)->to(new CreateRoleHandler($this->roleRepository));
        $router->route(AddUserRoles::class)->to(new AddUserRolesHandler($this->userRepository));
//        $router->route(DeleteUserRoles::class)->to(new DeleteUserRolesHandler($this->userRepository));

        /** Address */
        $router->route(CreateAddress::class)->to(new CreateAddressHandler($this->addressRepository));
        $router->route(EditAddress::class)->to(new EditAddressHandler($this->addressRepository));
        $router->route(DeleteAddress::class)->to(new DeleteAddressHandler($this->addressRepository));

        /** Company */
        $router->route(CreateCompany::class)->to(new CreateCompanyHandler($this->companyRepository, $this->userRepository));
        $router->route(AddCompanyEmployee::class)->to(new AddCompanyEmployeeHandler($this->companyRepository, $this->userRepository));
        $router->route(AddCompanyAddress::class)->to(new AddCompanyAddressHandler($this->companyRepository, $this->addressRepository));
//        $router->route(AddHotelToCompany::class)->to(new AddHotelToCompanyHandler($this->addressRepository));

        $router->attachToMessageBus($this->commandBus);
    }

    /**
     * @return UserRepository
     */
    public function getUserRepository(): UserRepository
    {
        return $this->userRepository;
    }

    /**
     * @return RoleRepository
     */
    public function getRoleRepository(): RoleRepository
    {
        return $this->roleRepository;
    }

    /**
     * @return AddressRepository
     */
    public function getAddressRepository(): AddressRepository
    {
        return $this->addressRepository;
    }

    /**
     * @return CompanyRepository
     */
    public function getCompanyRepository(): CompanyRepository
    {
        return $this->companyRepository;
    }


    /**
     * @return CommandBus
     */
    public function getCommandBus(): CommandBus
    {
        return $this->commandBus;
    }

}
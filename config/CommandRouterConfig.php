<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:55
 */

namespace Config;

use HotelApp\Domain\Model\Command\Role\CreateRole;
use HotelApp\Domain\Model\Command\User\AddUserRoles;
use HotelApp\Domain\Model\Command\User\RegisterUser;
use HotelApp\Domain\Model\Handler\Role\CreateRoleHandler;
use HotelApp\Domain\Model\Handler\User\AddUserRolesHandler;
use HotelApp\Domain\Model\Handler\User\RegisterUserHandler;
use HotelApp\Infrastructure\Role\RoleRepository;
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

    private $commandBus;

    public function __construct(EventStore $eventStore, SnapshotStore $snapshotStore, CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
        $this->userRepository = new UserRepository($eventStore, $snapshotStore);
        $this->roleRepository = new RoleRepository($eventStore, $snapshotStore);
    }

    public function get()
    {
        $router = new CommandRouter();
        $router->route(RegisterUser::class)->to(new RegisterUserHandler($this->userRepository));
        $router->route(CreateRole::class)->to(new CreateRoleHandler($this->roleRepository));
        $router->route(AddUserRoles::class)->to(new AddUserRolesHandler($this->userRepository));
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
     * @return CommandBus
     */
    public function getCommandBus(): CommandBus
    {
        return $this->commandBus;
    }

}
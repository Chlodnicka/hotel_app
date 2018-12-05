<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 19:50
 */


namespace {

    use HotelApp\Domain\Model\Command\Role\CreateRole;
    use HotelApp\Domain\Model\Command\User\AddUserRoles;
    use HotelApp\Domain\Model\Command\User\RegisterUser;
    use HotelApp\Domain\Model\Handler\Role\CreateRoleHandler;
    use HotelApp\Domain\Model\Handler\User\AddUserRolesHandler;
    use HotelApp\Domain\Model\Handler\User\RegisterUserHandler;
    use HotelApp\Infrastructure\Role\RoleRepository;
    use HotelApp\Infrastructure\User\UserRepository;
    use Prooph\Common\Event\ProophActionEventEmitter;
    use Prooph\EventStore\ActionEventEmitterEventStore;
    use Prooph\EventStore\InMemoryEventStore;
    use Prooph\EventStore\Pdo\Projection\MySqlProjectionManager;
    use Prooph\EventStoreBusBridge\EventPublisher;
    use Prooph\ServiceBus\CommandBus;
    use Prooph\ServiceBus\EventBus;
    use Prooph\ServiceBus\Plugin\Router\CommandRouter;
    use Prooph\SnapshotStore\InMemorySnapshotStore;

    include "vendor/autoload.php";

//    $pdo = new PDO('mysql:dbname=prooph;host=localhost', 'root', '');
//    $eventStore = new MySqlEventStore(new FQCNMessageFactory(), $pdo, new MySqlAggregateStreamStrategy());
    $eventStore = new InMemoryEventStore();
    $eventEmitter = new ProophActionEventEmitter();
    $eventStore = new ActionEventEmitterEventStore($eventStore, $eventEmitter);

    $eventBus = new EventBus($eventEmitter);
    $eventPublisher = new EventPublisher($eventBus);
    $eventPublisher->attachToEventStore($eventStore);

    $snapshotStore = new InMemorySnapshotStore();
//    $pdoSnapshotStore = new PdoSnapshotStore($pdo);
    $userRepository = new UserRepository($eventStore, $snapshotStore);
    $roleRepository = new RoleRepository($eventStore, $snapshotStore);

//    $projectionManager = new MySqlProjectionManager($eventStore, $pdo);

    $commandBus = new CommandBus();
    $router = new CommandRouter();
    $router->route(RegisterUser::class)->to(new RegisterUserHandler($userRepository));
    $router->route(CreateRole::class)->to(new CreateRoleHandler($roleRepository));
    $router->route(AddUserRoles::class)->to(new AddUserRolesHandler($userRepository));
    $router->attachToMessageBus($commandBus);

//    $userProjector = new UserProjector($pdo);
//    $eventRouter = new EventRouter();
//    $eventRouter->route(EmailChanged::class)->to([$userProjector, 'onEmailChanged']);
//    $eventRouter->route(UserRegistered::class)->to([$userProjector, 'onUserRegistered']);
//    $eventRouter->attachToMessageBus($eventBus);


}
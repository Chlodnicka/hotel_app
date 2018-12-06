<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 19:50
 */


namespace {

    use Prooph\Common\Event\ProophActionEventEmitter;
    use Prooph\Common\Messaging\FQCNMessageFactory;
    use Prooph\EventStore\ActionEventEmitterEventStore;
    use Prooph\EventStore\InMemoryEventStore;
    use Prooph\EventStore\Pdo\MySqlEventStore;
    use Prooph\EventStore\Pdo\PersistenceStrategy\MySqlAggregateStreamStrategy;
    use Prooph\EventStore\Pdo\Projection\MySqlProjectionManager;
    use Prooph\EventStore\Projection\InMemoryProjectionManager;
    use Prooph\EventStoreBusBridge\EventPublisher;
    use Prooph\ServiceBus\CommandBus;
    use Prooph\ServiceBus\EventBus;
    use Prooph\SnapshotStore\InMemorySnapshotStore;
    use Prooph\SnapshotStore\Pdo\PdoSnapshotStore;
    use Config\CommandRouterConfig;
    use Config\EventRouterConfig;

    include "vendor/autoload.php";
    include "config/CommandRouterConfig.php";
    include "config/EventRouterConfig.php";

    $dotenv = new Dotenv\Dotenv(__DIR__);
    $dotenv->load();

    $environment = getenv('ENVIRONMENT');

    if ($environment === 'dev') {
        $eventStore = new InMemoryEventStore();
        $snapshotStore = new InMemorySnapshotStore();
        $projectionManager = new InMemoryProjectionManager($eventStore);
    } else {
        $pdo = new PDO('mysql:dbname=' . getenv('DB_NAME') . ';host=' . getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASSWORD'));
        $eventStore = new MySqlEventStore(new FQCNMessageFactory(), $pdo, new MySqlAggregateStreamStrategy());
        $snapshotStore = new PdoSnapshotStore($pdo);
        $projectionManager = new MySqlProjectionManager($eventStore, $pdo);
    }

    $eventEmitter = new ProophActionEventEmitter();
    $eventStore = new ActionEventEmitterEventStore($eventStore, $eventEmitter);
    $eventBus = new EventBus($eventEmitter);
    $eventPublisher = new EventPublisher($eventBus);
    $eventPublisher->attachToEventStore($eventStore);
    $commandBus = new CommandBus();

    $router = new CommandRouterConfig($eventStore, $snapshotStore, $commandBus);
    $router->get();

    $eventRouter = new EventRouterConfig($eventBus);
    $eventRouter->get();

}
<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 19:32
 */

namespace HotelApp\Infrastructure\Room;

use HotelApp\Domain\Model\Room;
use HotelApp\Infrastructure\RoomInterface;
use Prooph\EventSourcing\Aggregate\AggregateRepository;
use Prooph\EventSourcing\Aggregate\AggregateType;
use Prooph\EventSourcing\EventStoreIntegration\AggregateTranslator;
use Prooph\EventStore\EventStore;
use Prooph\SnapshotStore\SnapshotStore;

class RoomRepository extends AggregateRepository implements RoomInterface
{
    public function __construct(EventStore $eventStore, SnapshotStore $snapshotStore)
    {
        parent::__construct(
            $eventStore,
            AggregateType::fromAggregateRootClass(Room::class),
            new AggregateTranslator(),
            $snapshotStore,
            null,
            true
        );
    }

    /**
     * @param Room $user
     */
    public function save(Room $user): void
    {
        $this->saveAggregateRoot($user);
    }

    /**
     * @param string $id
     * @return Room|null
     */
    public function load(string $id): ?Room
    {
        return $this->getAggregateRoot($id);
    }
}
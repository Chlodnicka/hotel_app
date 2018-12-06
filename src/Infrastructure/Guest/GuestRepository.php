<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 19:32
 */

namespace HotelApp\Infrastructure\User;

use HotelApp\Domain\Model\Guest;
use HotelApp\Infrastructure\GuestInterface;
use Prooph\EventSourcing\Aggregate\AggregateRepository;
use Prooph\EventSourcing\Aggregate\AggregateType;
use Prooph\EventSourcing\EventStoreIntegration\AggregateTranslator;
use Prooph\EventStore\EventStore;
use Prooph\SnapshotStore\SnapshotStore;

class GuestRepository extends AggregateRepository implements GuestInterface
{
    public function __construct(EventStore $eventStore, SnapshotStore $snapshotStore)
    {
        parent::__construct(
            $eventStore,
            AggregateType::fromAggregateRootClass(Guest::class),
            new AggregateTranslator(),
            $snapshotStore,
            null,
            true
        );
    }

    public function save(Guest $guest): void
    {
        $this->saveAggregateRoot($guest);
    }

    public function load(string $id): ?Guest
    {
        return $this->getAggregateRoot($id);
    }
}
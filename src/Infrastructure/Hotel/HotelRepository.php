<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 19:32
 */

namespace HotelApp\Infrastructure\Hotel;

use HotelApp\Domain\Model\Hotel;
use HotelApp\Infrastructure\HotelInterface;
use Prooph\EventSourcing\Aggregate\AggregateRepository;
use Prooph\EventSourcing\Aggregate\AggregateType;
use Prooph\EventSourcing\EventStoreIntegration\AggregateTranslator;
use Prooph\EventStore\EventStore;
use Prooph\SnapshotStore\SnapshotStore;

class HotelRepository extends AggregateRepository implements HotelInterface
{
    public function __construct(EventStore $eventStore, SnapshotStore $snapshotStore)
    {
        parent::__construct(
            $eventStore,
            AggregateType::fromAggregateRootClass(Hotel::class),
            new AggregateTranslator(),
            $snapshotStore,
            null,
            true
        );
    }

    /**
     * @param Hotel $hotel
     */
    public function save(Hotel $hotel): void
    {
        $this->saveAggregateRoot($hotel);
    }

    /**
     * @param string $id
     * @return Hotel|null
     */
    public function load(string $id): ?Hotel
    {
        return $this->getAggregateRoot($id);
    }
}
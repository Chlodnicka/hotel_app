<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 19:32
 */

namespace HotelApp\Infrastructure\User;

use HotelApp\Domain\Model\Address;
use HotelApp\Infrastructure\AddressInterface;
use Prooph\EventSourcing\Aggregate\AggregateRepository;
use Prooph\EventSourcing\Aggregate\AggregateType;
use Prooph\EventSourcing\EventStoreIntegration\AggregateTranslator;
use Prooph\EventStore\EventStore;
use Prooph\SnapshotStore\SnapshotStore;

class AddressRepository extends AggregateRepository implements AddressInterface
{
    public function __construct(EventStore $eventStore, SnapshotStore $snapshotStore)
    {
        parent::__construct(
            $eventStore,
            AggregateType::fromAggregateRootClass(Address::class),
            new AggregateTranslator(),
            $snapshotStore,
            null,
            true
        );
    }

    public function save(Address $address): void
    {
        $this->saveAggregateRoot($address);
    }

    public function load(string $id): ?Address
    {
        return $this->getAggregateRoot($id);
    }
}
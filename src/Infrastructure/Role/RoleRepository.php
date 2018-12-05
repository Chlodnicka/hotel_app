<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 20:23
 */

namespace HotelApp\Infrastructure\Role;

use HotelApp\Domain\Model\Role;
use Prooph\EventSourcing\Aggregate\AggregateRepository;
use HotelApp\Infrastructure\RoleRepository as RoleInterface;
use Prooph\EventSourcing\Aggregate\AggregateType;
use Prooph\EventSourcing\EventStoreIntegration\AggregateTranslator;
use Prooph\EventStore\EventStore;
use Prooph\SnapshotStore\SnapshotStore;

class RoleRepository extends AggregateRepository implements RoleInterface
{
    public function __construct(EventStore $eventStore, SnapshotStore $snapshotStore)
    {
        parent::__construct(
            $eventStore,
            AggregateType::fromAggregateRootClass(Role::class),
            new AggregateTranslator(),
            $snapshotStore,
            null,
            true
        );
    }

    public function save(Role $role): void
    {
        $this->saveAggregateRoot($role);
    }

    public function load(string $id): ?Role
    {
        return $this->getAggregateRoot($id);
    }
}
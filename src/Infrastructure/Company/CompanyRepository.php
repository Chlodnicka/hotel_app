<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 19:32
 */

namespace HotelApp\Infrastructure\User;

use HotelApp\Domain\Model\Company;
use HotelApp\Infrastructure\CompanyInterface;
use Prooph\EventSourcing\Aggregate\AggregateRepository;
use Prooph\EventSourcing\Aggregate\AggregateType;
use Prooph\EventSourcing\EventStoreIntegration\AggregateTranslator;
use Prooph\EventStore\EventStore;
use Prooph\SnapshotStore\SnapshotStore;

class CompanyRepository extends AggregateRepository implements CompanyInterface
{
    public function __construct(EventStore $eventStore, SnapshotStore $snapshotStore)
    {
        parent::__construct(
            $eventStore,
            AggregateType::fromAggregateRootClass(Company::class),
            new AggregateTranslator(),
            $snapshotStore,
            null,
            true
        );
    }

    public function save(Company $company): void
    {
        $this->saveAggregateRoot($company);
    }

    public function load(string $id): ?Company
    {
        return $this->getAggregateRoot($id);
    }
}
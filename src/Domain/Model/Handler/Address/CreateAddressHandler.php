<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:02
 */

namespace HotelApp\Domain\Model\Handler\Address;


use HotelApp\Domain\Model\Address;
use HotelApp\Domain\Model\Command\Address\CreateAddress;
use HotelApp\Infrastructure\Address\AddressRepository;

class CreateAddressHandler
{
    /** @var  AddressRepository */
    private $repository;

    /**
     * CreateAddressHandler constructor.
     * @param AddressRepository $repository
     */
    public function __construct(AddressRepository $repository)
    {
        $this->repository = $repository;
    }


    public function __invoke(CreateAddress $createAddress)
    {
        $address = Address::createWithData(
            $createAddress->id(),
            $createAddress->street(),
            $createAddress->buildingNumber(),
            $createAddress->flatNumber(),
            $createAddress->postalCode(),
            $createAddress->city()
        );
        $this->repository->save($address);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:09
 */

namespace HotelApp\Domain\Model\Handler\Address;


use HotelApp\Domain\Model\Command\Address\DeleteAddress;
use HotelApp\Infrastructure\Address\AddressRepository;

class DeleteAddressHandler
{
    /** @var  AddressRepository */
    private $repository;

    /**
     * DeleteAddressHandler constructor.
     * @param AddressRepository $repository
     */
    public function __construct(AddressRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(DeleteAddress $deleteAddress)
    {
        $address = $this->repository->load($deleteAddress->id());
        if ($address) {
            $address->delete();
            $this->repository->save($address);
        }
    }

}
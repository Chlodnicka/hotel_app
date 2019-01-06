<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.01.2019
 * Time: 13:31
 */

namespace HotelApp\Domain\Model\Handler\Address;


use HotelApp\Domain\Model\Command\Address\EditAddress;
use HotelApp\Infrastructure\Address\AddressRepository;

class EditAddressHandler
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


    public function __invoke(EditAddress $editAddress)
    {
        $address = $this->repository->load($editAddress->id());
        if ($address) {
            $address->edit(
                $editAddress->street(),
                $editAddress->buildingNumber(),
                $editAddress->flatNumber(),
                $editAddress->postalCode(),
                $editAddress->city()
            );
        }
        $this->repository->save($address);
    }
}
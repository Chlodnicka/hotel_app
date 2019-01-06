<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:15
 */

namespace HotelApp\Domain\Model\Handler\Hotel;


use HotelApp\Domain\Model\Command\Hotel\AddHotelAddress;
use HotelApp\Infrastructure\Address\AddressRepository;
use HotelApp\Infrastructure\Hotel\HotelRepository;

class AddHotelAddressHandler
{
    /** @var  HotelRepository */
    private $repository;

    /** @var  AddressRepository */
    private $addressRepository;

    /**
     * AddHotelAddressHandler constructor.
     * @param HotelRepository $repository
     * @param AddressRepository $addressRepository
     */
    public function __construct(HotelRepository $repository, AddressRepository $addressRepository)
    {
        $this->repository = $repository;
        $this->addressRepository = $addressRepository;
    }

    public function __invoke(AddHotelAddress $addHotelAddress)
    {
        $hotel = $this->repository->load($addHotelAddress->id());
        $address = $this->addressRepository->load($addHotelAddress->addressId());
        if ($hotel && $address) {
            $hotel->addAddress($address);
            $this->repository->save($hotel);
        }
    }

}
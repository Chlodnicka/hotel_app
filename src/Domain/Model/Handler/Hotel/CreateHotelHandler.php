<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:10
 */

namespace HotelApp\Domain\Model\Handler\Hotel;

use HotelApp\Domain\Model\Command\Hotel\CreateHotel;
use HotelApp\Domain\Model\Hotel;
use HotelApp\Infrastructure\Company\CompanyRepository;
use HotelApp\Infrastructure\Hotel\HotelRepository;

class CreateHotelHandler
{
    /** @var  HotelRepository */
    private $repository;


    /**
     * CreateHotelHandler constructor.
     * @param HotelRepository $repository
     */
    public function __construct(HotelRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateHotel $createHotel)
    {
        $hotel = Hotel::createWithData($createHotel->id(), $createHotel->name());
        $this->repository->save($hotel);
    }


}
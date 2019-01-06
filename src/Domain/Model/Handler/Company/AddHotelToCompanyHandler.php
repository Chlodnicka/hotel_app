<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:04
 */

namespace HotelApp\Domain\Model\Handler\Company;


use HotelApp\Domain\Model\Command\Company\AddHotelToCompany;
use HotelApp\Infrastructure\Company\CompanyRepository;
use HotelApp\Infrastructure\Hotel\HotelRepository;

class AddHotelToCompanyHandler
{
    /** @var  CompanyRepository */
    private $repository;

    /** @var  HotelRepository */
    private $hotelRepository;

    /**
     * AddHotelToCompanyHandler constructor.
     * @param CompanyRepository $repository
     * @param HotelRepository $hotelRepository
     */
    public function __construct(CompanyRepository $repository, HotelRepository $hotelRepository)
    {
        $this->repository = $repository;
        $this->hotelRepository = $hotelRepository;
    }

    public function __invoke(AddHotelToCompany $addHotelToCompany)
    {
        $hotel = $this->hotelRepository->load($addHotelToCompany->hotelId());
        $company = $this->repository->load($addHotelToCompany->id());
        if ($hotel) {
            $company->addHotel($hotel);
            $this->repository->save($company);
        }
    }

}
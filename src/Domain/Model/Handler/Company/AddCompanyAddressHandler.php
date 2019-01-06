<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:01
 */

namespace HotelApp\Domain\Model\Handler\Company;


use HotelApp\Domain\Model\Command\Company\AddCompanyAddress;
use HotelApp\Infrastructure\Company\CompanyRepository;
use HotelApp\Infrastructure\Address\AddressRepository;

class AddCompanyAddressHandler
{
    /** @var  CompanyRepository */
    private $repository;

    /** @var  AddressRepository */
    private $addressRepository;

    /**
     * AddCompanyAddressHandler constructor.
     * @param CompanyRepository $repository
     * @param AddressRepository $addressRepository
     */
    public function __construct(CompanyRepository $repository, AddressRepository $addressRepository)
    {
        $this->repository = $repository;
        $this->addressRepository = $addressRepository;
    }


    public function __invoke(AddCompanyAddress $addCompanyAddress)
    {
        $address = $this->addressRepository->load($addCompanyAddress->addressId());
        $company = $this->repository->load($addCompanyAddress->id());
        if ($address && $company) {
            $company->addAddress($address);
            $this->repository->save($company);
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 16:59
 */

namespace HotelApp\Domain\Model\Command\Company;


use HotelApp\Domain\Model\Company;
use HotelApp\Infrastructure\Company\CompanyRepository;
use HotelApp\Infrastructure\User\UserRepository;

class CreateCompanyHandler
{
    /** @var  CompanyRepository */
    private $repository;

    /** @var  UserRepository */
    private $userRepository;

    /**
     * CreateCompanyHandler constructor.
     * @param CompanyRepository $repository
     */
    public function __construct(CompanyRepository $repository, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }


    public function __invoke(CreateCompany $createCompany)
    {
        $user = $this->userRepository->load($createCompany->ownerId());
        $company = Company::createWithData($createCompany->id(), $createCompany->name(), $user);
        $this->repository->save($company);
    }
}
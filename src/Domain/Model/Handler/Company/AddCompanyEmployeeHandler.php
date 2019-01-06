<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:05
 */

namespace HotelApp\Domain\Model\Handler\Company;


use HotelApp\Domain\Model\Command\Company\AddCompanyEmployee;
use HotelApp\Infrastructure\Company\CompanyRepository;
use HotelApp\Infrastructure\User\UserRepository;

class AddCompanyEmployeeHandler
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


    public function __invoke(AddCompanyEmployee $addCompanyEmployee)
    {
        $user = $this->userRepository->load($addCompanyEmployee->userId());
        $company = $this->repository->load($addCompanyEmployee->id());
        $company->addEmployee($user);
        $this->repository->save($company);
    }

}
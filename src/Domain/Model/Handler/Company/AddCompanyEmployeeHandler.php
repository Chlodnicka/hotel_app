<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:05
 */

namespace HotelApp\Domain\Model\Command\Company;


use HotelApp\Infrastructure\Company\CompanyRepository;
use HotelApp\Infrastructure\User\UserRepository;
use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

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
        $company = Company::createWithData($createCompany->id(), $createCompany->name(), $user);
        $this->repository->save($company);
    }

}
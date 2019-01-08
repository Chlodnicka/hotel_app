<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:15
 */

namespace HotelApp\Domain\Model\Handler\Hotel;


use HotelApp\Domain\Model\Command\Hotel\AddHotelAddress;
use HotelApp\Domain\Model\Command\Hotel\AddHotelEmployee;
use HotelApp\Infrastructure\Hotel\HotelRepository;
use HotelApp\Infrastructure\User\UserRepository;

class AddHotelEmployeeHandler
{
    /** @var  HotelRepository */
    private $repository;

    /** @var  UserRepository */
    private $userRepository;

    /**
     * AddHotelEmployeeHandler constructor.
     * @param HotelRepository $repository
     * @param UserRepository $userRepository
     */
    public function __construct(HotelRepository $repository, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }


    public function __invoke(AddHotelEmployee $addHotelEmployee)
    {
        $hotel = $this->repository->load($addHotelEmployee->id());
        $employee = $this->userRepository->load($addHotelEmployee->employeeId());
        if ($hotel && $employee) {
            $hotel->addEmployee($employee);
            $this->repository->save($hotel);
        }
    }

}
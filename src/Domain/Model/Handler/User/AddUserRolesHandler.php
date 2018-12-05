<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 20:40
 */

namespace HotelApp\Domain\Model\Handler\User;


use HotelApp\Domain\Model\Command\User\AddUserRoles;
use HotelApp\Infrastructure\User\UserRepository;

class AddUserRolesHandler
{
    /** @var  UserRepository */
    private $repository;

    /**
     * AddUserRolesHandler constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(AddUserRoles $addUserRoles)
    {
        $user = $this->repository->load($addUserRoles->id());
        $user->addRoles($addUserRoles->roles());
        $this->repository->save($user);
    }

}
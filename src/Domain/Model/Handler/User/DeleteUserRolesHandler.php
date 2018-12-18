<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 20:19
 */

namespace HotelApp\Domain\Model\Command\User;


use HotelApp\Infrastructure\User\UserRepository;

class DeleteUserRolesHandler
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

    public function __invoke(DeleteUserRoles $deleteUserRoles)
    {
        $user = $this->repository->load($deleteUserRoles->id());
        $user->deleteRoles($deleteUserRoles->roles());
        $this->repository->save($user);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 20:15
 */

namespace HotelApp\Domain\Model\Command\User;


use HotelApp\Infrastructure\User\UserRepository;

class EditUserHandler
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

    public function __invoke(EditUser $editUser)
    {
        $user = $this->repository->load($editUser->id());
        $user->edit($editUser->firstName(), $editUser->lastName());
        $this->repository->save($user);
    }

}
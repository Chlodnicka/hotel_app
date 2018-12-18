<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 20:17
 */

namespace HotelApp\Domain\Model\Command\User;


use HotelApp\Infrastructure\User\UserRepository;

class ChangeUserPasswordHandler
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

    public function __invoke(ChangeUserPassword $changeUserPassword)
    {
        $user = $this->repository->load($changeUserPassword->id());
        if ($user->getEmail() === $changeUserPassword->email()) {
            $user->changePassword($changeUserPassword->password());
            $this->repository->save($user);
        } else {
            throw new \Exception('Wrong email');
        }
    }

}
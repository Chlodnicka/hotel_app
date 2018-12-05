<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 19:28
 */

namespace HotelApp\Domain\Model\Handler\User;

use HotelApp\Domain\Model\Command\User\RegisterUser;
use HotelApp\Domain\Model\User;
use HotelApp\Infrastructure\User\UserRepository;


class RegisterUserHandler
{
    /** @var  UserRepository */
    private $repository;

    /**
     * RegisterUserHandler constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(RegisterUser $registerUser)
    {
        $user = User::registerWithData($registerUser->id(), $registerUser->email(), $registerUser->password());
        $this->repository->save($user);
    }

}
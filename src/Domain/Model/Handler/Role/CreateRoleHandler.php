<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 05.12.2018
 * Time: 20:21
 */

namespace HotelApp\Domain\Model\Handler\Role;

use HotelApp\Domain\Model\Command\Role\CreateRole;
use HotelApp\Domain\Model\Role;
use HotelApp\Infrastructure\Role\RoleRepository;

class CreateRoleHandler
{
    /** @var  RoleRepository */
    private $repository;

    /**
     * CreateRoleHandler constructor.
     * @param RoleRepository $repository
     */
    public function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
    }


    public function __invoke(CreateRole $createRole)
    {
        $user = Role::createWithData($createRole->id(), $createRole->name());
        $this->repository->save($user);
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 06.12.2018
 * Time: 17:01
 */

namespace HotelApp\Domain\Model\Command\Company;


use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;

class AddCompanyAddressHandler
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
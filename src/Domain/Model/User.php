<?php
/**
 * Created by PhpStorm.
 * User: majac
 * Date: 15.09.2018
 * Time: 16:43
 */

namespace HotelApp\Domain\Model;

use HotelApp\Domain\Model\Event\User\UserEdited;
use HotelApp\Domain\Model\Event\User\UserPasswordChanged;
use HotelApp\Domain\Model\Event\User\UserRegistered;
use HotelApp\Domain\Model\Event\User\UserRolesAdded;
use HotelApp\Domain\Model\Event\User\UserRolesDeleted;
use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;

class User extends AggregateRoot
{
    /** @var  string */
    private $id;

    /** @var  string */
    private $email;

    /** @var  string */
    private $password;

    /** @var  string */
    private $firstname;

    /** @var  string */
    private $lastname;

    /** @var  Role[] */
    private $roles = [];

    /** @var  Hotel[] */
    private $hotels;

    protected function aggregateId(): string
    {
        return $this->id;
    }

    static public function registerWithData(string $id, string $email, string $password): self
    {
        $obj = new self;
        $obj->recordThat(UserRegistered::occur($id, [
            'email' => $email,
            'password' => $password
        ]));

        return $obj;
    }

    public function addRoles($roles): void
    {
        $roles = array_diff($roles, $this->roles);

        if (empty($roles)) {
            return;
        }

        $this->recordThat(UserRolesAdded::occur($this->id, [
            'roles' => $roles
        ]));
    }

    public function deleteRoles(array $roles): void
    {
        $roles = array_diff($this->roles, $roles);

        $this->recordThat(UserRolesDeleted::occur($this->id, [
            'roles' => $roles
        ]));
    }

    public function edit(string $lastName, string $firstName): void
    {
        if ($this->lastname === $lastName && $this->firstname === $firstName) {
            return;
        }

        $this->recordThat(UserEdited::occur($this->id, [
            'firstName' => $firstName,
            'lastName' => $lastName
        ]));
    }

    public function changePassword(string $password): void
    {
        if ($this->password === $password) {
            return;
        }
        $this->recordThat(UserPasswordChanged::occur($this->id, [
            'password' => $password
        ]));
    }

    protected function apply(AggregateChanged $event): void
    {
        switch (get_class($event)) {
            case UserRegistered::class:
                /** @var UserRegistered $event */
                $this->id = $event->aggregateId();
                $this->email = $event->email();
                $this->password = $event->password();
                break;
            case UserRolesAdded::class:
                /** @var UserRolesAdded $event */
                $this->roles = array_merge($this->roles, $event->roles());
                break;
            case UserRolesDeleted::class:
                /** @var UserRolesDeleted $event */
                $this->roles = $event->roles();
                break;
            case UserPasswordChanged::class:
                /** @var UserPasswordChanged $event */
                $this->password = $event->password();
                break;
            case UserEdited::class:
                /** @var UserEdited $event */
                $this->firstname = $event->firstName();
                $this->lastname = $event->lastName();
                break;
        }
    }
}
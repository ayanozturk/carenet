<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Role;
use AppBundle\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testSettersGetters()
    {
        $data = [
            'id' => 123,
            'first_name' => 'test first name',
            'last_name' => 'test last name',
            'email' => 'test@ayanozturk.com',
            'password' => 'super-secret',
            'user_roles' => [new Role()],
            'created' => new \DateTime(),
            'updated' => new \DateTime(),
        ];

        $role = new User();
        $role->setId($data['id']);
        $role->setFirstName($data['first_name']);
        $role->setLastName($data['last_name']);
        $role->setEmail($data['email']);
        $role->setPassword($data['password']);
        $role->setUserRoles($data['user_roles']);
        $role->setUpdated($data['updated']);
        $role->setCreated($data['created']);

        $this->assertEquals($data['id'], $role->getId());
        $this->assertEquals($data['first_name'], $role->getFirstName());
        $this->assertEquals($data['last_name'], $role->getLastName());
        $this->assertEquals($data['email'], $role->getEmail());
        $this->assertEquals($data['password'], $role->getPassword());
        $this->assertEquals($data['user_roles'], $role->getUserRoles());
        $this->assertEquals($data['updated'], $role->getUpdated());
        $this->assertEquals($data['created'], $role->getCreated());
    }
}

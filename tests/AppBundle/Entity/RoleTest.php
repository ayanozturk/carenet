<?php
namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Role;
use PHPUnit\Framework\TestCase;

class RoleTest extends TestCase
{
    public function testSettersGetters()
    {
        $data = [
            'id' => 123,
            'name' => 'my-role'
        ];

        $role = new Role();
        $role->setId($data['id']);
        $role->setName($data['name']);

        $this->assertEquals($data['id'], $role->getId());
        $this->assertEquals($data['name'], $role->getName());
    }
}

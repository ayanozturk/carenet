<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Role;
use AppBundle\Entity\Skill;
use AppBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
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

        $user = new User();
        $user->setId($data['id']);
        $user->setFirstName($data['first_name']);
        $user->setLastName($data['last_name']);
        $user->setEmail($data['email']);
        $user->setPassword($data['password']);
        $user->setUserRoles($data['user_roles']);
        $user->setUpdated($data['updated']);
        $user->setCreated($data['created']);

        $this->assertEquals($data['id'], $user->getId());
        $this->assertEquals($data['first_name'], $user->getFirstName());
        $this->assertEquals($data['last_name'], $user->getLastName());
        $this->assertEquals($data['email'], $user->getEmail());
        $this->assertEquals($data['password'], $user->getPassword());
        $this->assertEquals($data['user_roles'], $user->getUserRoles());
        $this->assertEquals($data['updated'], $user->getUpdated());
        $this->assertEquals($data['created'], $user->getCreated());
        $this->assertEquals($data['email'], $user->getUsername());
        $this->assertEquals(['ROLE_USER'], $user->getRoles());

        $user->eraseCredentials();
        $this->assertNull($user->getPassword());
        $this->assertNull($user->getSalt());
    }

    public function testSkills()
    {
        $user = new User();
        $phpSkill = (new Skill())->setId(1)->setName('PHP');
        $cssSkill = (new Skill())->setId(2)->setName('CSS');

        $user->addSkill($phpSkill);
        $user->addSkill($cssSkill);

        $userSkills = $user->getSkills();
        $this->assertInstanceOf(ArrayCollection::class, $userSkills);
        $this->assertTrue($userSkills->contains($phpSkill));
        $this->assertTrue($userSkills->contains($cssSkill));

        $user->removeSkill($cssSkill);
        $this->assertFalse($userSkills->contains($cssSkill));
    }
}

<?php
namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Skill;
use PHPUnit\Framework\TestCase;

class SkillTest extends TestCase
{
    public function testSettersGetters()
    {
        $data = [
            'id' => 123,
            'name' => 'my-skill'
        ];

        $skill = new Skill();
        $skill->setId($data['id']);
        $skill->setName($data['name']);

        $this->assertEquals($data['id'], $skill->getId());
        $this->assertEquals($data['name'], $skill->getName());
    }
}

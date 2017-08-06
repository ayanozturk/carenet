<?php
namespace Tests\AppBundle\Service;

use AppBundle\Entity\Role;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Prophecy\Argument;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use AppBundle\Service;

class UserTest extends KernelTestCase
{

    public function setUp()
    {
        self::bootKernel();
    }

    public function testCreateUser()
    {
        $roleRepository = $this->prophesize(EntityRepository::class);
        $roleRepository->findOneBy(['name' => 'ROLE_USER'])->willReturn(new Role());

        $em = $this->prophesize(EntityManager::class);
        $em->getRepository("AppBundle:Role")->willReturn($roleRepository->reveal());
        $em->persist(Argument::any())->willReturn(true);
        $em->flush(Argument::any())->willReturn(true);

        $encoder = static::$kernel->getContainer()
            ->get('security.password_encoder');

        $service = new Service\User($em->reveal(), $encoder);

        $this->assertInstanceOf(Service\User::class, $service);

        $user = new User();
        $user->setFirstName('TestUser');
        $user->setLastName('TestLastName');
        $user->setEmail('test@mail.com');
        $user->setPassword('mypassword');

        $service->create($user);

        $this->assertGreaterThanOrEqual(time(), $user->getCreated()->getTimestamp());
        $this->assertGreaterThanOrEqual(time(), $user->getUpdated()->getTimestamp());
        $this->assertNotEquals('mypassword', $user->getPassword());
    }
}

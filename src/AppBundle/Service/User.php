<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class User
{

    /* @var EntityManager */
    protected $entityManager;

    /* @var UserPasswordEncoder */
    protected $encoder;

    public function __construct(
        EntityManagerInterface $entityManager,
        UserPasswordEncoderInterface $encoder
    )
    {
        $this->entityManager = $entityManager;
        $this->encoder = $encoder;
    }

    public function create(Entity\User $user): User
    {
        $this->encodePassword($user);
        $this->setUserRoles($user);

        $user->setCreated(new \DateTime());
        $user->setUpdated(new \DateTime());

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $this;
    }

    private function setUserRoles(Entity\User $user): Entity\User
    {
        $roleRepo = $this->entityManager->getRepository('AppBundle:Role');
        $role = $roleRepo->findOneBy([
            'name' => 'ROLE_USER'
        ]);

        $user->setUserRoles([$role]);

        return $user;
    }

    private function encodePassword(Entity\User $user): Entity\User
    {
        $plainPassword = $user->getPassword();
        $encoded = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);

        return $user;
    }
}

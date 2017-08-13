<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function profileAction($user_id)
    {
        $userService = $this->container->get('AppBundle\Service\User');
        $user = $userService->findById($user_id);

        if (!$user) {
            return $this->render('default/404.html.twig');
        }

        return $this->render('user/profile.html.twig', [
            'user' => $user,
            'myprofile' => $user === $this->getUser()
        ]);
    }
}

<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function profileAction()
    {
        return $this->render('user/profile.html.twig', [
            'user' => $this->getUser()
        ]);
    }
}

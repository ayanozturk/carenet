<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class SecurityController
 *
 * This controller handles user login and registration actions
 *
 * @package AppBundle\Controller
 */
class SecurityController extends Controller
{
    public function loginAction()
    {
        $data = [];

        $authenticationUtils = $this->get('security.authentication_utils');

        $data['error'] = $authenticationUtils->getLastAuthenticationError();
        $data['last_username'] = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', $data);
    }

    public function registerAction()
    {
        $data = [];
        $data['error'] = null;
        $data['last_username'] = null;



        return $this->render('security/register.html.twig', $data);
    }
}

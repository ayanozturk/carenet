<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity;
use AppBundle\Form;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;

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

    public function registerAction(Request $request)
    {
        $data = [];
        $data['error'] = null;
        $data['last_username'] = null;

        $user = new Entity\User();
        $form = $this->createForm(Form\Type\UserRegister::class, $user);
        $form->add('password', PasswordType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plainPassword = $user->getPassword();
            $encoder = $this->container->get('security.password_encoder');
            $encoded = $encoder->encodePassword($user, $plainPassword);

            $user->setPassword($encoded);

            $em = $this->getDoctrine()->getManager();

            $roleRepo = $em->getRepository('AppBundle:Role');
            $role = $roleRepo->findOneBy([
                'name' => 'ROLE_USER'
            ]);

            $user->setUserRoles([$role]);
            $user->setCreated(new \DateTime());
            $user->setUpdated(new \DateTime());

            $em->persist($user);
            $em->flush();

            $this->addFlash(
                'notice',
                'Registration completed. You can login with your email and password.'
            );

            return $this->redirectToRoute('login');
        }

        $data['form'] = $form->createView();

        return $this->render('security/register.html.twig', $data);
    }
}

<?php
namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

class SkillController extends FOSRestController
{

    public function getSkillAction($id)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $skillRepository = $em->getRepository('AppBundle:Skill');

        $skill = $skillRepository->find($id);

        if (!$skill) {
           throw $this->createNotFoundException();
        }

        return $this->handleView(new View($skill));
    }
}

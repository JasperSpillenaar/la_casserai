<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LaCasseraiController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('App:Room')->findAll();

        return $this->render('la_casserai/index.html.twig', [
            'controller_name' => 'LaCasseraiController',
            'room' => $entity
        ]);
    }
}

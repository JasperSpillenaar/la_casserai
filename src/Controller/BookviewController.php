<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BookviewController extends AbstractController
{
    /**
     * @Route("/bookview", name="bookview")
     */
    public function index()
    {
        $current_date = new \DateTime();

        $em = $this->getDoctrine()->getManager();
        $booking = $em->getRepository('App:reservation')->findBy(['checkin_date' => $current_date]);
        $endtime = $em->getRepository('App:reservation')->findBy(['checkout_date' => $current_date]);


        return $this->render('Bookview/index.html.twig', [
            'booking' => $booking,
            'endtime' => $endtime,
            'controller_name' => 'BookviewController',
        ]);
    }
}

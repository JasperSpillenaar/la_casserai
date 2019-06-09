<?php

namespace App\Controller;

use App\Form\BookFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Reservation;

class BookController extends AbstractController
{
    /**
     * @Route("/book/{slug}", name="book")
     */
    public function index($slug, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('App:Room')->findBy(array("id" => $slug));
        $room_id = $em->getRepository('App:Room')->find($slug);

        $book_room = new Reservation();
        $form = $this->createForm(BookFormType::class, $book_room);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user_id = $this->getUser()->getId();
            $user = $em->getRepository('App:User')->find($user_id);
            $book_room->setUserId($user);
            $book_room->setRoomId($room_id);

            $em->persist($book_room);
            $em->flush();

            return $this->redirectToRoute('default');
        }

            return $this->render('Book/index.html.twig', [
            'controller_name' => 'BookController',
            'room' => $entity,
            'form' => $form->createView()
        ]);
    }
}

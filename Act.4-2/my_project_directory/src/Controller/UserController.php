<?php

namespace App\Controller;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="app_user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

     /**
     * @Route("/user", name="app_user")
     */
    public function createUser(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $user = new User();
        $user->setFirstname('Samar');
        $user->setLastname('Cherni');
        $user->setEmail('samar.cherni@talan.com');
        $user->setAdress('Ariana');
        $user->setBirthdate('28-09-95');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($user);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$user->getId());
    }
}

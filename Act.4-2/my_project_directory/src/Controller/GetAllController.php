<?php

namespace App\Controller;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetAllController extends AbstractController
{
    /**
     * @Route("/get/all", name="app_get_all")
     */
    public function index(): Response
    {
        $repo =$this->getDoctrine()->getRepository(User::class);
        $users =$repo->findAll();
        return $this->render('get_all/index.html.twig', [
            'controller_name' => 'GetAllController',
            'users'=>$users
        ]);
    }
             /**
     * @Route("/getall", name="app_user")
     */
    // public function GetAll(ManagerRegistry $doctrine): Response
    // {
    //     $user->getFirstName();
    //     $user->getLastName();
    //     $user->getEmail();
    //     $user->getAdress();
    //     $user->getBirthdate();
    //     return new Response('Saved new product with id '.$user->getId());
    // }
}

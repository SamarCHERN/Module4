<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Product;
use  App\Repository\CategoryRepository;
use  App\Repository\ProductRepository;
use Doctrine\Persistence\ManagerRegistry;

class MessageController extends AbstractController
{
    /**
     * @Route("/message", name="app_message")
     */
    public function create(UserRepository $userRepository,MessagesRepository $messagesRepository,$id): Response
    {
        // $user = $userRepository->find($id);
        // $message = $messagesRepository->find($user->getMessage());
        // $messages=$message->getTexte();

        return $this->render('message/index.html.twig', [
            'messages' => $messages,
        ]);
    }
}

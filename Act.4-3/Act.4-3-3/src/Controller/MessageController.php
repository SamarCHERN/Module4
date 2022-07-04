<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Messages;
use  App\Repository\UserRepository;
use  App\Repository\MessagesRepository;
use Doctrine\Persistence\ManagerRegistry;

class MessageController extends AbstractController
{
    /**
     * @Route("/message/{id}", name="app_entity_Message")
     */
    public function show(userRepository $UserRepository, int $id): Response
    {
//         $user = $this->getDoctrine()
//             ->getRepository(User::class)
//             ->findOneByIdJoinedToMessages($id);
//     $message=$user->getMessage();

//             return $this->render('message/index.html.twig', [
//                 'user' => $user,
//                 'message' => $message,
// ]);
$user = $userRepository->find($id);
$messages = $user->getMesaage();
return $this->render('message/index.html.twig', [
    'user' => $user,
    'messages' => $messages
]);
}
}

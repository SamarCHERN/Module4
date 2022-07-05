<?php

namespace App\Controller;

use App\Entity\Equipe;
use App\Entity\Joueur;
use App\Form\EquipeType;
use App\Form\JoueurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Validator\Constraints\LessThan;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class EquipeController extends AbstractController
{
    /**
     * @Route("/equipe", name="app_equipe")
     */
    public function index(): Response
    {
        return $this->render('equipe/index.html.twig', [
            'controller_name' => 'EquipeController',
        ]);
    }
        /**
     * @Route("/equipeJ", name="equipe")
     */ 
    public function newform(Request $request, ManagerRegistry $doctrine): Response
    {  
        $equipe =new Equipe();
        $joueur = new Joueur();
        $equipe->getJoueur()->add($joueur);
        $joueur2 = new Joueur();
        $equipe->getJoueur()->add($joueur);

        $equipe = new Equipe();
        $form = $this->createForm(EquipeType::class, $equipe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $doctrine->getManager();
        $entityManager->persist($equipe);
        $entityManager->flush();
        return $this->redirectToRoute('app_equipe',[
            'user'=>$User
        ]);
}
    return $this->render('equipe/equiprJoueur.html.twig', [
        'formEquipe' => $form->createView(),
        //'app_equipe' => $app_equipe,

    ]);
    }
}

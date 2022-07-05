<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\IdUser;
use App\Form\FormUserType;
use App\Form\IdFormType;
use App\Entity\Ville;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EntityType;
//use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Validator\Constraints\LessThan;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

use Doctrine\ORM\EntityRepository;

class FormController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('form/home.html.twig', [
            'controller_name' => 'FormulaireController',
        ]);
    }
     /**
     * @Route("/route", name="app_route")
     */ 
    public function route(Request $request, ManagerRegistry $doctrine): Response
     {
        $iduser = new IdUser();
        $form = $this->createForm(IdFormType::class, $iduser);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($iduser);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('form/form.html.twig', [
            'iduser' => $form->createView(),
        ]);
    }
 
    /**
     * @Route("/form", name="app_form")
     */ 
    public function newform(Request $request, ManagerRegistry $doctrine): Response
     {
        $User = new User();
        $form = $this->createForm(FormUserType::class, $User);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $doctrine->getManager();
        $entityManager->persist($User);
        $entityManager->flush();
        return $this->redirectToRoute('app_route',[
            'user'=>$User
        ]);
}
    return $this->render('form/index.html.twig', [
        'formUser' => $form->createView(),
        'User' => $User,

    ]);
    }


}

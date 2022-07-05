<?php

namespace App\Controller;
use App\Entity\User;
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
     * @Route("/form", name="app_form")
     */ 
    public function new(Request $request): Response
    {
        $user = new User();
        //$ville=new Ville();

        $form = $this->createFormBuilder($user)
            ->add('Nom', TextType::class)
            ->add('Prenom',TextType::class )
            ->add('Age',NumberType::class, [
                'constraints'=> [new LessThan([
                    'value' => 100]),
                    new GreaterThan([
                        'value' => 1
                    ])
                    ]] )
            ->add('Adresse', TextType::class, ['attr' => ['maxlength' => 255]])
            ->add('Code_Postal',TextType::class,['attr' => ['maxlength' => 5]])
            ->add('Ville',ChoiceType::class,[
                'choices'=> [
                    'Tunis' => 1,
                    'Kef' => 2,
                    'Ariana' => 3,
                ],
                // 'class' => Ville::class,
                // 'choice_label' => function ($ville) {
                //     return $ville->getName();
                // }
            ])
            ->add('Permis_de_Conduire',ChoiceType::class,['required' => false,'choices' => [
                'AM' => 'AM',
                'A1' => 'A1',
                'A2' => 'A2',
                'A' => 'A',
                'B1' => 'B1',
                'B' => 'B'
            ],
            'expanded' => true,
            'multiple' => true
        ])
            ->add('save', SubmitType::class, ['label' => 'Save'])
            ->getForm();

      return $this->render('form/index.html.twig', [
    'formUser' =>$form->createView(),
]);
    }
}

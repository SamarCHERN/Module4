<?php

namespace App\Form;

use App\Entity\Equipe;
use App\Form\JoueurType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EquipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NomEquipe')
            ->add('Ville')
            ->add('Sport')
            ->add('joueur', CollectionType::class, [
                'entry_type' => JoueurType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
            ])
            ->add('save', SubmitType::class, ['label' => 'Save'])
            ;
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Equipe::class,
        ]);
    }
}

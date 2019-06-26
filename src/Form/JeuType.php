<?php

namespace App\Form;

use App\Entity\Jeu;
use App\Entity\Duree;
use App\Entity\Niveau;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JeuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('jaquette')
            ->add('critere')
            ->add('resume')
            ->add('agemin')
            ->add('agemax')
            ->add('prixconcours')
            ->add('regle')
            ->add('ambiance')
            ->add('nbjoueurmin')
            ->add('nbjoueurmax')
            ->add('niveau', EntityType::class,[
                'class' => Niveau::class,
                'choice_label' => 'niveau',
            ])
            ->add('duree', EntityType::class,[
                'class' => Duree::class,
                'choice_label' => 'duree',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Jeu::class,
        ]);
    }
}

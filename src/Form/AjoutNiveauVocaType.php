<?php

namespace App\Form;

use App\Entity\Vocabulaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Niveau;

class AjoutNiveauVocaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle',TextType::class)
            ->add('libelle_en',TextType::class)
            ->add('niveau', EntityType::class,[
                'class'=>Niveau::class,
                'choice_label'=>'libelle',
                'multiple'=> false,
            ])
            ->add('ajouter',SubmitType::class)

            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vocabulaire::class,
        ]);
    }
}

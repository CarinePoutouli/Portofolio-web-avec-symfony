<?php

namespace App\Form;

use App\Entity\Auteur;
use App\Entity\Blog;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ['attr'=>['class'=>'from-control','placeholder'=>'telephone'] ,"label"=>"nom"
                ])
            ->add('prenom', TextType::class, ['attr'=>['class'=>'from-control']])
            ->add('age', IntegerType::class, ['attr'=>['class'=>'from-control']])
            ->add('Blog', EntityType::class, [
                // looks for choices from this entity
                'class' => Blog::class,'choice_label' => 'nom',
                'attr'=>['class'=>'from-control']

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Auteur::class,
        ]);
    }
}

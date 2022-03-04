<?php

namespace App\Form;

use App\Entity\Disc;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeleteFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('discTitle')
            ->add('discYear')
            ->add('discPicture')
            ->add('discLabel')
            ->add('discGenre')
            ->add('discPrice')
            ->add('artists')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Disc::class,
        ]);
    }
}

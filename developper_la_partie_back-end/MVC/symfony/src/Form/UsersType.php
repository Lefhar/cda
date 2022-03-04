<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ['constraints' => [
                new NotBlank(),
                new Regex('/^[a-zA-Z]{2,}$/')
            ],'attr' => ['class' => 'form-control', 'required' => true]])
            ->add('prenom', TextType::class, ['constraints' => [
                new NotBlank(),
                new Regex('/[a-zA-Z]{2,}$/')
            ],'attr' => ['class' => 'form-control', 'required' => true]])
            ->add('email', EmailType::class, ['constraints' => [
                new NotBlank(),
                new Regex(['pattern'=>'/[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/','match'=>true, 'message' => 'Veuillez entrer une adresse email correct'])

            ],'attr' => ['class' => 'form-control', 'required' => true]])
            ->add('password', PasswordType::class, ['constraints' => [
                new NotBlank(),
                new Regex('(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,})$')
            ],
                'attr' => ['class' => 'form-control', 'required' => 'required']])
            ->add('password', RepeatedType::class, [
                'invalid_message' => 'Veuillez indiquez le même mot de passe et mettre 8 caractéres dont une majuscule et un symbole',
                'first_options'  => ['label' => 'Mot de passe','attr' => [ 'required' => 'required']],
                'second_options' => ['label' => 'Confirmation de mot de passe','attr' => [ 'required' =>true]],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}

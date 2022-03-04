<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\UsersType;
use App\Repository\ArtistRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils, ArtistRepository $MenuArtistes): Response
    {
         if ($this->getUser()) {
             return $this->redirectToRoute('listes');
         }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('users/login.html.twig', ['last_username' => $lastUsername, 'error' => $error,   'menu' => $MenuArtistes->findBy([], ['artistName' => 'asc']),]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request, EntityManagerInterface $entityManager, ArtistRepository $MenuArtistes, userPasswordHasherInterface $passwordHasher): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('listes');
        }

        $user = new Users();
        $form = $this->createForm(UsersType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $hashedPassword = $passwordHasher->hashPassword(
                $user,
                $form->getData()->getPassword()
            );
            $user->setNom($form->getData()->getNom());
            $user->setPrenom($form->getData()->getPrenom());
            $user->setEmail($form->getData()->getEmail());
            $user->setDateRegister(new \DateTime());

            $user->setPassword($hashedPassword);
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_login', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('users/register.html.twig', [
            'user' => $user,
            'form' => $form,
            'menu' => $MenuArtistes->findBy([], ['artistName' => 'asc']),
        ]);
    }
}

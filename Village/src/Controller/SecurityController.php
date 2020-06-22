<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $password)
    {
        $user = new User();
        $formRegister = $this->createForm(RegistrationType::class, $user);

        $formRegister->handleRequest($request);

        if ($formRegister->isSubmitted() && $formRegister->isValid()) {
            $hash = $password->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $user->setRoles(['ROLE_USER']);
            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('security_connexion');
        }
        return $this->render('security/inscription.html.twig', [
            'formRegister' => $formRegister->createView()
        ]);
    }
    /**
     * @Route("/Connexion", name="security_connexion")
     */
    public function login()
    {
        return $this->render('security/login.html.twig', [
            "currentmenu" => 'connexion'
        ]);
    }
    /**
     * @Route("/Deconnexion", name="security_deconnexion")
     */
    public function logout()
    {
    }
}

<?php

namespace App\Controller\Admin;

use DateTime;
use DateTimeZone;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AdminController extends AbstractController
{
    private $em;
    private $repo;

    public function __construct(EntityManagerInterface $em, UserRepository $repo)
    {
        $this->em = $em;
        $this->repo = $repo;
    }

    /**
     * @Route("admin/users", name="admin_users")
     */
    public function index()
    {
        //* Instanciation Date courante 
        $currentTime = (new DateTime('now', new DateTimeZone("Europe/Paris")))->format('d/m/Y H:i');

        return $this->render("Admin/user.html.twig", [
            "users" => $this->repo->findAll(),
            "dateTime" => $currentTime
        ]);
    }
    /**
     * @Route("admin/user/edit/{id}", name="admin_user_edit")
     */
    public function edit(User $user, Request $request)
    {
        $form = $this->createForm(UserType::class, $user); 
        $form->handleRequest($request); 

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            $this->addFlash('success', "L'utilisateur {$user->getUsername()} a été modifié avec succès !");

            return $this->redirectToRoute('admin_users'); 
        }

        return $this->render("Admin/edit.html.twig", [
            "user" => $user,
            "formUser" => $form->createView(),
        ]);
    }
    /**
     * @Route("admin/user/delete{id}", name="admin_user_delete")
     */
    public function delete(User $user)
    {
        $this->em->remove($user);
        $this->em->flush();
        return $this->redirectToRoute('admin_users'); 
    }
  


}

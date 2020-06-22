<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use App\Form\EventType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\EventRepository;
use App\Repository\UserRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;

/**
 * Par défault la classe prend la route /admin, les autres routes venant se concaténées
 * @Route("/admin", name="admin_")
 */
class AdminEventController extends AbstractController
{

    private $event;
    private $em;
    private $users;

    public function __construct(EventRepository $event, UserRepository $users, EntityManagerInterface $em)
    {
        $this->event = $event;
        $this->em = $em;
        $this->users = $users;
    }

    /**
     * @Route("/", name="index")
     */
    public function index()
    {

        return $this->render("Admin/index.html.twig", [
            'controller_name' => 'AdminEventController'
        ]);
    }

    /**
     * @Route("/users", name="admin_users")
     */
    public function userList(UserRepository $users)
    {

        return $this->render("admin/user.html.twig", [
            "users" => $users->findAll()
        ]);
    }

    // /**
    //  * @Route("/creation", name="creation")
    //  */
    // public function create(Request $request)
    // {
    //     $event = new Event();
    //     $form = $this->createForm(EventType::class, $event); //Création du formulaire, basé sur la classe EventType(différents types d'attributs)
    //     $form->handleRequest($request); //Inspecte la requête HTTP

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $this->em->persist($event);
    //         $this->em->flush();
    //         $this->addFlash('success', "Evénement ajouté avec success !");

    //         return $this->redirectToRoute('event'); //Redirection vers la page du nouvel événement créer

    //     }

    //     return $this->render("admin/create.html.twig", [
    //         "currentmenu" => "event_create",
    //         "formEvent" => $form->createView()
    //     ]);
    // }

}

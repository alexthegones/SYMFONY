<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use App\Form\EventType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\EventRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;


class AdminEventController extends AbstractController
{

    private $repo;
    private $em;

    public function __construct(EventRepository $repo, EntityManagerInterface $em)
    {
        $this->repo = $repo;
        $this->em = $em;
    }

    /**
     * @Route("/Admin", name="admin_event_index")
     */
    public function index()
    {
        $events = $this->repo->findAll();
        return $this->render("admin/index.html.twig", [
            "events" => $events
        ]);
    }

    /**
     * @Route("/Admin/create", name="admin_event_create")
     */
    public function create(Request $request)
    {

        $event = new Event();
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($event);
            $this->addFlash('success', "Evenement ajouté avec success");
            $this->em->flush();

            return $this->redirectToRoute('admin_event_index'); //header(location:)
        }
        return $this->render("Admin/create.html.twig", [
            "formEvent" => $form->createView()
        ]);
    }

    //  /**
    //  * @Route("/Admin/event{id}", name="admin_event_edit")
    //  */
    // public function edit(Request $request)
    // {


    // }

}

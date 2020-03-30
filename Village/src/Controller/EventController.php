<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\EventSearch;
use App\Form\EventSearchType;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\EventType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

class EventController extends AbstractController
{
    private $repo;
    private $em;

    public function __construct(EventRepository $repo, EntityManagerInterface $em)
    {
        $this->repo = $repo;
        $this->em = $em;
    }

    /**
     * @Route("/Evenement", name="event")
     */
    public function event(PaginatorInterface $paginator, Request $request)
    {   
        //Filtrage
        $search = new EventSearch();
        $formSearch = $this->createForm(EventSearchType::class, $search);
        $formSearch->handleRequest($request);

        //Pagination
        $donnees = $this->getDoctrine()->getRepository(Event::class)->findAll($search);

        $events = $paginator->paginate(
            $donnees,
            $request->query->getInt('page', 1), //N° de la page en cours, 1 par défaut
            10
        );


        return $this->render('event/event.html.twig', [
            "currentmenu" => "event",
            "events" => $events,
            "form" => $formSearch->createView()
            
        ]);
    }
    /**
     * @Route("/Evenement/new", name="event_create")
     * * @param Request $request
     */
    public function create(Request $request)
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event); //Création du formulaire, basé sur la classe EventType(différents types d'attributs)
        $form->handleRequest($request); //Inspecte la requête HTTP

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($event);
            //$this->addFlash('success', "Evénement ajouté avec success");
            $this->em->flush();

            return $this->redirectToRoute('event'); //Redirection vers la page du nouvel événement créer
        }

        return $this->render("event/create.html.twig", [
            "currentmenu" => "event_create",
            "formEvent" => $form->createView()
        ]);
    }
    /**
     * @Route("/Evenement/edition/{id}", name="event_edit")
     * @param Event $event 
     * @param Request $request
     */
    public function edit(Event $event, Request $request)
    {
        $form = $this->createForm(EventType::class, $event); //Création du formulaire, basé sur la classe EventType(différents types d'attributs)
        $form->handleRequest($request); //Inspecte la requête HTTP

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            //$this->addFlash('success', "Evénement modifié avec success");

            return $this->redirectToRoute('event_show', ['id' => $event->getid()]); //Redirection vers la route 'home'

        }
        return $this->render("event/edit.html.twig", [
            "formEvent" => $form->createView()
        ]);
    }
    /**
     * @Route("/Evenement/delete{id}", name="event_delete")
     * @param Event $event 
     */
    public function delete(Event $event)
    {
        $this->em->remove($event);
        $this->em->flush();
        //$this->addFlash('success', "Suppression avec succès");

        return $this->redirectToRoute('home'); //Redirection vers la route 'home'

        // return $this->render("event/delete.html.twig",[
        //     "event" => $event
        // ]);
    }
    /**
     * @Route("/Evenement/{id}", name="event_show")
     * @param Event $event
     */
    public function show(Event $event) //Param converter(lien entre objet event et l'id en question au vue de la route)
    {
        return $this->render('event/show.html.twig', [
            "event" => $event
        ]);
    }
}

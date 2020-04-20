<?php

namespace App\Controller;

use DateTime;
use DateTimeZone;
use App\Entity\Event;
use App\Entity\Contact;
use App\Form\EventType;
use App\Form\ContactType;
use App\Entity\EventSearch;
use App\Form\EventSearchType;
use Symfony\Component\Mime\Email;
use App\Repository\EventRepository;
use Symfony\Component\Mime\Address;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
        //Instanciation Date courante 
        $currentTime = (new DateTime('now', new DateTimeZone("Europe/Paris")))->format('d/m/Y H:i');

        //Filtrage(Search)
        $search = new EventSearch();
        $formSearch = $this->createForm(EventSearchType::class, $search);
        $formSearch->handleRequest($request);
        $donnees = $this->repo->findByAll();
        if (!empty($search)) {
            if ($formSearch->isSubmitted() && $formSearch->isValid()) {
                $donnees = $this->repo->findSearch($search);
            }
        } else {
            //Récupération de l'ensemble des events de la bdd
            $donnees;
        }

        //Pagination
        $events = $paginator->paginate(
            $donnees, //query(list des events)
            $request->query->getInt('page', 1), //N° de la page en cours, 1 par défaut
            10 //nb d'event par page
        );

        return $this->render('event/event.html.twig', [
            "currentmenu" => "event",
            "dateTime" => $currentTime,
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
            $this->em->flush();
            $this->addFlash('success', "Evénement ajouté avec success !");

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
            $this->addFlash('success', "Evénement modifié avec success !");

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
        $this->addFlash('error', "Suppression réussie !");

        return $this->redirectToRoute('home'); //Redirection vers la route 'home'
    }
    /**
     * @Route("/Evenement/{id}", name="event_show")
     * @param Event $event
     */
    public function show(Event $event, Request $request, MailerInterface $mailer) //Param converter(lien entre objet event et l'id en question au vue de la route)
    {
        //Envoi d'email
        $contact = new Contact();
        $contact->setEvent($contact);
        $formContact = $this->createForm(ContactType::class, $contact);
        $formContact->handleRequest($request);

        if ($formContact->isSubmitted() && $formContact->isValid()) {
            //Envoi d'email
            $email = (new Email())

                //Expéditeur
                ->from(new Address($contact->getEmail(), $contact->getNom()))
                // ->from('hello@example.com')

                //Destinataire
                ->to('you@example.com')
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')

                //Répondre à..
                ->replyTo($contact->getEmail())

                //->priority(Email::PRIORITY_HIGH)

                //Sujet du mail
                ->subject('Time for Symfony Mailer!')
                ->text('Sending emails is fun again!')

                //Corps du message en format HTML
                ->html('<p>' . $contact->getmessage() . '</p>');

            $mailer->send($email);
            $this->addFlash('success', "Email envoyé avec succès !");
        }

        return $this->render('event/show.html.twig', [
            "event" => $event,
            "formContact" => $formContact->createView()
        ]);
    }
}

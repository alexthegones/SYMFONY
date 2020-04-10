<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\EventSearch;
use App\Form\EventSearchType;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    private $repo;
    private $em;

    public function __construct(EventRepository $repo, EntityManagerInterface $em)
    {
        $this->repo = $repo;
        $this->em = $em;
    }

    /**
     * @Route("/", name="home")
     */
    public function home(Request $request)
    {
        //Filtrage(Search)
        $search = new EventSearch();
        $formSearch = $this->createForm(EventSearchType::class, $search);
        $formSearch->handleRequest($request);

        $events = $this->repo->findByAll();
        if (!empty($search)) {
            if ($formSearch->isSubmitted() && $formSearch->isValid()) {
                $events = $this->repo->findSearch($search);
            }
        } else {
            //Récupération de l'ensemble des events de la bdd
            $events;
        }


        return $this->render('home.html.twig', [
            "currentmenu" => "home", //(variable/parametre)
            "events" => $events,
            "form" => $formSearch->createview()
        ]);
    }
    /**
     * @Route("/Activitee", name="activity")
     */
    public function activity()
    {
        return $this->render('activity.html.twig', [
            "currentmenu" => "activity"
        ]);
    }

    /**
     * @Route("/Histoire", name="history")
     */
    public function history()
    {
        return $this->render('history.html.twig', [
            "currentmenu" => "history"
        ]);
    }


}

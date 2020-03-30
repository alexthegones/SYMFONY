<?php

namespace App\Controller;

use App\Repository\EventRepository;
use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     * @param EventRepository $repository
     */
    public function home() //Injection de la classe 'EventRepository' dependance entre objets
    {
        //récupère tous les évents
        $events = $this->getDoctrine()->getRepository(event::class)->findAll();
        
        return $this->render('home.html.twig', [
            "currentmenu" => "home", //(variable/parametre)
            "events" => $events
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


    /**
     * @Route("/Contact", name="contact")
     */
    public function contact()
    {
        return $this->render('contact.html.twig', [
            "currentmenu" => "contact"
        ]);
    }
}

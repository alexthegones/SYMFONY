<?php

namespace App\Controller;

use DateTime;
use DateTimeZone;
use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{

    /**
     * @Route("/Contact", name="contact")
     */
    public function sendEmail(MailerInterface $mailer, Request $request)
    {
        //Instanciation Date courante 
        $currentTime = (new DateTime('now', new DateTimeZone("Europe/Paris")))->format('d/m/Y H:i');

        //Instanciation 
        $contact = new Contact();
        $contact->setEvent($contact);
        $formContact = $this->createForm(ContactType::class, $contact);
        $formContact->handleRequest($request);

        if ($formContact->isSubmitted() && $formContact->isValid()) {
            //Envoi d'email
            $email = (new Email())

                //Expéditeur
                ->from(new Address($contact->getEmail(), 'Alex'))
                // ->from('hello@example.com')

                //Destinataire
                ->to('toyou@example.com')
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

        return $this->render('contact.html.twig', [
            "dateTime" => $currentTime,
            "formContact" => $formContact->createView()
        ]);
    }
}

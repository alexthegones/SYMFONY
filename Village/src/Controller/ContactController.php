<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mime\Address;

class ContactController extends AbstractController
{

    /**
     * @Route("/Contact", name="contact")
     */
    public function sendEmail(MailerInterface $mailer, Request $request)
    {
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
                ->to('cyelle@sfr.fr')
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
            "formContact" => $formContact->createView()
        ]);
    }
}

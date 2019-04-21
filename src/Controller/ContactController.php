<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class ContactController.
 *
 * @category Symfony4
 * @package  App\Controller
 * @author   Display Name <thomaslaure3@gmail.com>
 * @license  https://www.gnu.org/licenses/license-list.fr.html GPL
 * @link     https://symfony.com/
 */
class ContactController extends AbstractController
{
    /**
     * Point d'entrée de la page du formulaire de contact.
     *
     * @Route("/contact", name="contact")
     *
     * @param Request $request
     * @param $mailer
     *
     * @return Response|null
     */
    public function index(Request $request, \Swift_Mailer $mailer): ?Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $message = (new \Swift_Message($contact->getSubject()))
                ->setFrom('noreply@stamina.com')
                ->setTo('mdesligues@gmail.com')
                ->setReplyTo($contact->getEmail())
                ->setBody(' > Nom : ' . ucwords(strtolower($contact->getName())) . "\n > Prénom : " . ucwords(strtolower($contact->getFirstName())) . "\n > E-mail : " . $contact->getEmail() . "\n > Message : " . $contact->getMessage(), 'text/plain');
            $mailer->send($message);
            $this->addFlash('success', 'Votre e-mail nous a bien été envoyé !');
            return $this->redirectToRoute('contact');
        }
        return $this->render('contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
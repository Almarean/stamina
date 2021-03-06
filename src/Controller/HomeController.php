<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Monster;
use App\Entity\News;
use App\Entity\Zone;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class HomeController.
 *
 * @category Symfony4
 * @package  App\Controller
 * @author   Display Name <thomaslaure3@gmail.com>
 * @license  https://www.gnu.org/licenses/license-list.fr.html GPL
 * @link     https://symfony.com/
 */
class HomeController extends AbstractController
{
    /**
     * Point d'entrée du site.
     *
     * @Route("/", name="home")
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
            return $this->redirectToRoute('home');
        }
        return $this->render('home.html.twig', array(
            'zones' => $this->getDoctrine()->getRepository(Zone::class)->findAll(),
            'monsters' => $this->getDoctrine()->getRepository(Monster::class)->findAll(),
            'news' => array_slice($this->getDoctrine()->getRepository(News::class)->findByIdDesc(), 0, 5),
            'form' => $form->createView()
        ));
    }
}
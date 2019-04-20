<?php

namespace App\Controller;

use App\Entity\Player;
use App\Form\PlayerType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RegistrationController extends AbstractController
{
    /**
     * Point d'entrée du formulaire d'enregistrement de joueur.
     *
     * @Route("/registration", name="registration")
     *
     * @param Request $request
     * @param ObjectManager $manager
     *
     * @return Response|null
     */
    public function index(Request $request, ObjectManager $manager): ?Response
    {
        $player = new Player();
        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $player->setName(ucwords(strtolower($player->getName())));
            $manager->persist($player);
            $manager->flush();
            $this->addFlash('success', 'Vous avez bien été enregistré !');
            return $this->redirectToRoute('registration');
        } else if (!$form->isSubmitted() || !$form->isValid()) {
            $this->addFlash('danger', 'Une erreur est survenue, vous n\'avez pas pu être enregistré...');
        }
        return $this->render('registration.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
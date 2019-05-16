<?php

namespace App\Controller;

use App\Entity\Player;
use App\Form\RegistrationType;
use App\Service\RegistrationService;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class RegistrationController.
 *
 * @category Symfony4
 * @package  App\Controller
 * @author   Display Name <thomaslaure3@gmail.com>
 * @license  https://www.gnu.org/licenses/license-list.fr.html GPL
 * @link     https://symfony.com/
 */
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
    public function index(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder, RegistrationService $service): ?Response
    {
        $errors = array();
        $player = new Player();
        $form = $this->createForm(RegistrationType::class, $player);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $name = ucwords(strtolower($player->getName()));
            if ($service->checkPlayerNameExistence($name)) {
                $error = new \stdClass();
                $error->label = 'name';
                $error->message = 'Un compte existe déjà avec ce pseudo';
                array_push($errors, $error);
            }
            if ($service->checkPlayerEmailExistence($player->getEmail())) {
                $error = new \stdClass();
                $error->label = 'email';
                $error->message = 'Un compte existe déjà avec cette adresse e-mail';
                array_push($errors, $error);
            }
            if (strlen($player->getPassword()) < 8 && strlen($player->getRepeatPassword()) < 8) {
                $error = new \stdClass();
                $error->label = 'length';
                $error->message = 'Le mot de passe doit comprendre au moins 8 caractères';
                array_push($errors, $error);
            }
            if ($player->getPassword() !== $player->getRepeatPassword()) {
                $error = new \stdClass();
                $error->label = 'correspondence';
                $error->message = 'Les mots de passe doivent correspondre';
                array_push($errors, $error);
            }
            if (!count($errors) > 0) {
                $player->setName($name);
                $player->setRegistrationDate(new \Datetime());
                $player->setPassword($encoder->encodePassword($player, $player->getPassword()));
                $manager->persist($player);
                $manager->flush();
                return $this->render('login.html.twig', array(
                    'message' => 'Vous avez bien été enregistré !'
                ));
            } else {
                return $this->render('registration.html.twig', array(
                    'form' => $form->createView(),
                    'errors' => $errors
                ));
            }
        }
        return $this->render('registration.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
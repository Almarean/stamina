<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RegistrationController.
 */
class LoginController extends AbstractController
{
    /**
     * Point d'entrée du formulaire de connexion.
     *
     * @Route("/login", name="login")
     *
     * @param Request $request
     * @param ObjectManager $manager
     *
     * @return Response|null
     */
    public function index(Request $request): ?Response
    {
        return $this->render('login.html.twig');
    }

    /**
     * Point d'entrée pour la déconnexion du joueur.
     *
     * @Route("/logout", name="logout")
     *
     * @return void
     */
    public function logout() {}
}
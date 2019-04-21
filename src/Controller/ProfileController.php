<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class ProfileController.
 *
 * @category Symfony4
 * @package  App\Controller
 * @author   Display Name <thomaslaure3@gmail.com>
 * @license  https://www.gnu.org/licenses/license-list.fr.html GPL
 * @link     https://symfony.com/
 */
class ProfileController extends AbstractController
{
    /**
     * Point d'entrée de la page du profil utilisateur.
     *
     * @Route("/profile", name="profile")
     *
     * @return response|null
     */
    public function index(): ?Response
    {
        return $this->render('profile.html.twig');
    }
}
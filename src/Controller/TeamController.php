<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TeamController.
 *
 * @category Symfony4
 * @package  App\Controller
 * @author   Display Name <thomaslaure3@gmail.com>
 * @license  https://www.gnu.org/licenses/license-list.fr.html GPL
 * @link     https://symfony.com/
 */
class TeamController extends AbstractController
{
    /**
     * Point d'entrée de l'affichage de l'équipe.
     *
     * @Route("/team", name="team")
     *
     * @return Response|null
     */
    public function index(): ?Response
    {
        return $this->render('team.html.twig');
    }
}
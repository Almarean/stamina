<?php

namespace App\Controller;

use App\Entity\Player;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class AdminPlayersController.
 *
 * @category Symfony4
 * @package  App\Controller
 * @author   Display Name <thomaslaure3@gmail.com>
 * @license  https://www.gnu.org/licenses/license-list.fr.html GPL
 * @link     https://symfony.com/
 */
class AdminPlayersController extends AbstractController
{
    /**
     * Point d'entrée de l'affichage des joueurs sur l'interface d'administration.
     *
     * @Route("/admin/players", name="admin_players")
     *
     * @return Response|null
     */
    public function index(): ?Response
    {
        $players = $this->getDoctrine()->getRepository(Player::class)->findByIdDesc();
        return $this->render('admin_players.html.twig', array(
            'players' => $players
        ));
    }
}
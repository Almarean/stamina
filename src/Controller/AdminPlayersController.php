<?php

namespace App\Controller;

use App\Entity\Player;
use Doctrine\Common\Persistence\ObjectManager;
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

    /**
     * Supprime le joueur choisi.
     *
     * @Route("/admin/players/delete/{id}", name="admin_players_delete")
     *
     * @param int $id ID du joueur à supprimer.
     * @param ObjectManager $manager
     *
     * @return Response|null
     */
    public function deletePlayer(int $id, ObjectManager $manager): ?Response
    {
        $player = $this->getDoctrine()->getRepository(Player::class)->find($id);
        $manager->remove($player);
        $manager->flush();
        return $this->redirectToRoute('admin_players');
    }
}
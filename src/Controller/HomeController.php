<?php

namespace App\Controller;

use App\Entity\News;
use App\Entity\Zone;
use App\Entity\Monster;
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
    public function index(): ?Response
    {
        $monsters = $this->getDoctrine()->getRepository(Monster::class)->findAll();
        $zones = $this->getDoctrine()->getRepository(Zone::class)->findAll();
        $randomIdMonster = rand(0, count($monsters) - 1);
        $randomIdZone = rand(0, count($zones) - 1);
        $randomMonster = $monsters[$randomIdMonster];
        $randomZone = $zones[$randomIdZone];
        $news = array_slice($this->getDoctrine()->getRepository(News::class)->findByIdDesc(), 0, 5);
        return $this->render('home.html.twig', array(
            'random_zone' => $randomZone,
            'random_monster' => $randomMonster,
            'news' => $news
        ));
    }
}
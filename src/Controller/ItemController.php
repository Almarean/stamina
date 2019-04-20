<?php

namespace App\Controller;

use App\Entity\Zone;
use App\Entity\Monster;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class ItemController.
 *
 * @category Symfony4
 * @package  App\Controller
 * @author   Display Name <thomaslaure3@gmail.com>
 * @license  https://www.gnu.org/licenses/license-list.fr.html GPL
 * @link     https://symfony.com/
 */
class ItemController extends AbstractController
{
    /**
     * Point d'entrée de l'affichage des items.
     *
     * @Route("/items/{typeItems}", name="items")
     *
     * @param string $typeItems Type d'items à afficher.
     *
     * @return Response|null
     */
    public function index(string $typeItems): ?Response
    {
        $items = null;
        if ($typeItems === 'bestiary') {
            $items = $this->getDoctrine()->getRepository(Monster::class)->findAll();
        } else if ($typeItems === 'zones') {
            $items = $this->getDoctrine()->getRepository(Zone::class)->findAll();
        } else {
            return $this->render('404.html.twig');
        }
        return $this->render('items.html.twig', array(
            'items' => $items,
            'type_items' => $typeItems
        ));
    }
}
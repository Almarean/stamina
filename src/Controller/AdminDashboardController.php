<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminDashboardController.
 *
 * @category Symfony4
 * @package  App\Controller
 * @author   Display Name <thomaslaure3@gmail.com>
 * @license  https://www.gnu.org/licenses/license-list.fr.html GPL
 * @link     https://symfony.com/
 */
class AdminDashboardController extends AbstractController
{
    /**
     * Point d'entrée du tableau de bord de l'interface d'administration.
     *
     * @Route("/admin", name="admin_dashboard")
     *
     * @return Response|null
     */
    public function index(): ?Response
    {
        return $this->render('admin_dashboard.html.twig');
    }
}
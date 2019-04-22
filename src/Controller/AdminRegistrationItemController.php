<?php

namespace App\Controller;

use App\Entity\News;
use App\Entity\Zone;
use App\Form\NewsType;
use App\Form\ZoneType;
use App\Entity\Monster;
use App\Form\MonsterType;
use App\Service\RegistrationService;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class AdminRegistrationItemController.
 *
 * @category Symfony4
 * @package  App\Controller
 * @author   Display Name <thomaslaure3@gmail.com>
 * @license  https://www.gnu.org/licenses/license-list.fr.html GPL
 * @link     https://symfony.com/
 */
class AdminRegistrationItemController extends AbstractController
{
    /**
     * Point d'entrée de l'enregistrement d'items.
     *
     * @Route("/admin/registration/{typeItem}", name="admin_registration_item")
     *
     * @param Request $request
     * @param string $typeItem Type de l'item à enregistrer.
     *
     * @return Response|null
     */
    public function index(Request $request, ObjectManager $manager, RegistrationService $service, string $typeItem): ?Response
    {
        $errors = array();
        $item = null;
        $form = null;
        if ($typeItem === 'monster') {
            $item = new Monster();
            $form = $this->createForm(MonsterType::class, $item);
        } else if ($typeItem === 'zone') {
            $item = new Zone();
            $form = $this->createForm(ZoneType::class, $item);
        } else if ($typeItem === 'news') {
            $item = new News();
            $form = $this->createForm(NewsType::class, $item);
        } else {
            return $this->render('404.html.twig');
        }
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $image = $form['image']->getData();
            if ($service->checkItemExistence($item->getName(), $typeItem)) {
                $error = new \stdClass();
                $error->label = 'item_existence';
                $error->message = 'Un item avec le même nom existe déjà';
                array_push($errors, $error);
            }
            if (!$service->testImageFormat($image)) {
                $error = new \stdClass();
                $error->label = 'image';
                $error->message = 'Le fichier importé n\'est pas considéré comme une image';
                array_push($errors, $error);
            }
            if (!count($errors) > 0) {
                $item->setName(ucwords(strtolower($item->getName())));
                $itemImage = $service->imageProcessing($image, $typeItem);
                $item->setImage($itemImage);
                /*if ($typeItem === 'monster') {
                    $item->setZone($item->getZone());
                }*/
                if ($typeItem === 'news') {
                    $item->setdate(new \Datetime());
                }
                $manager->persist($item);
                $manager->flush();
                return $this->render('admin_registration_item.html.twig', array(
                    'form' => $form->createView(),
                    'type_item' => $typeItem,
                    'success_message' => 'L\'item a été enregistré !'
                ));
            } else {
                return $this->render('admin_registration_item.html.twig', array(
                    'form' => $form->createView(),
                    'type_item' => $typeItem,
                    'errors' => $errors
                ));
            }
        }
        return $this->render('admin_registration_item.html.twig', array(
            'form' => $form->createView(),
            'type_item' => $typeItem
        ));
    }
}
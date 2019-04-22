<?php

namespace App\Service;

use App\Entity\News;
use App\Entity\Zone;
use App\Entity\Player;
use App\Entity\Monster;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class RegistrationService.
 *
 * @category Symfony4
 * @package App\Service
 * @author   Display Name <thomaslaure3@gmail.com>
 * @license  https://www.gnu.org/licenses/license-list.fr.html GPL
 * @link     https://symfony.com/
 */
class RegistrationService extends AbstractController
{
    /**
     * Vérifie l'existence d'un joueur par son adresse e-mail.
     *
     * @param string $email Adresse e-mail dont il faut vérifier l'existence.
     *
     * @return bool|null
     */
    public function checkPlayerEmailExistence(string $email): ?bool
    {
        $repository = $this->getDoctrine()->getRepository(Player::class);
        $result = $repository->findOneBy(array(
            'email' => $email
        ));
        return $result !== null;
    }

    /**
     * Vérifie l'existence d'un joueur par son pseudo.
     *
     * @param string $name Pseudo dont il faut vérifier l'existence.
     *
     * @return bool|null
     */
    public function checkPlayerNameExistence(string $name): ?bool
    {
        $repository = $this->getDoctrine()->getRepository(Player::class);
        $result = $repository->findOneBy(array(
            'name' => $name
        ));
        return $result !== null;
    }

    /**
     * Vérifie l'existence de l'item en base de données.
     *
     * @param string $name Nom de l'item dont il faut vérifier l'existence.
     *
     * @return bool|null
     */
    public function checkItemExistence(string $name, string $typeItem): ?bool
    {
        $repository = null;
        switch ($typeItem) {
            case 'monster':
                $repository = $this->getDoctrine()->getRepository(Monster::class);
                break;
            case 'zone':
                $repository = $this->getDoctrine()->getRepository(Zone::class);
                break;
            case 'news':
                $repository = $this->getDoctrine()->getRepository(News::class);
                break;
        }
        $result = $repository->findOneBy(array(
            'name' => $name
        ));
        return $result !== null;
    }

    /**
     * Vérifie le fait que le fichier importé soit une image compatible.
     *
     * @param UploadedFile $file Image importée.
     *
     * @return bool|null
     */
    public function testImageFormat(UploadedFile $file): ?bool
    {
        $extensionsAllowed = array('jpg', 'jpeg', 'png', 'gif');
        $extensionUploadedImage = $file->guessExtension();
        return in_array($extensionUploadedImage, $extensionsAllowed);
    }

    /**
     * Donne un nom unique au fichier uploadé, et on le déplace dans le dossier
     * du projet qui contiendra les images.
     * Retourne le nouveau nom du fichier.ss
     *
     * @param UploadedFile $file Image importée.
     * @param string $typeItem Type de l'item de l'image.
     *
     * @return string|null
     */
    public function imageProcessing(UploadedFile $file, string $typeItem): ?string
    {
        $imageName = $this->generateUniqueName() . '.' . $file->guessExtension();
        switch ($typeItem) {
            case 'monster':
                $file->move($this->getParameter('images_monsters_directory'), $imageName);
                break;
            case 'zone':
                $file->move($this->getParameter('images_zones_directory'), $imageName);
                break;
            case 'news':
                $file->move($this->getParameter('images_news_directory'), $imageName);
                break;
        }
        return $imageName;
    }

    /**
     * Génère un nom aléatoire à partir d'un MD5.
     *
     * @return string|null
     */
    private function generateUniqueName(): ?string
    {
        return md5(uniqid());
    }
}
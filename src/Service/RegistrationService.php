<?php

namespace App\Service;

use App\Entity\Player;
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
}
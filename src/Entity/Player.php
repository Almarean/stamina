<?php

namespace App\Entity;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Player extends User.
 *
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 *
 * @category Symfony4
 * @package  App\Entity
 * @author   Display Name <thomaslaure3@gmail.com>
 * @license  https://www.gnu.org/licenses/license-list.fr.html GPL
 * @link     https://symfony.com/
 */
class Player extends User
{
    /**
     * Rôles attribués au joueur.
     *
     * @ORM\Column(type="json")
     *
     * @var array
     */
    private $roles = [];

    /**
     * Date de création du compte du joueur.
     *
     * @ORM\Column(type="date")
     */
    private $registrationDate;

    /**
     * Accesseur des rôles du joueur.
     *
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    /**
     * Mutateur des rôles du joueur.
     *
     * @param array $roles
     *
     * @return self
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
}
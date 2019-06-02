<?php

namespace App\Entity;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;

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
     * Date de création du compte du joueur.
     *
     * @ORM\Column(type="date")
     */
    private $registrationDate;

    /**
     * Rôles attribués au joueur.
     *
     * @ORM\Column(type="json")
     *
     * @var array
     */
    private $roles = [];

    /**
     * Accesseur de la date de création du compte du joueur.
     *
     * @return \DateTimeInterface|null
     */
    public function getRegistrationDate(): ?\DateTimeInterface
    {
        return $this->registrationDate;
    }

    /**
     * Mutateur de la date de création du compte du joueur.
     *
     * @param \DateTimeInterface $registrationDate Date de création de compte à attribuer au joueur.
     *
     * @return self
     */
    public function setRegistrationDate(\DateTimeInterface $registrationDate): self
    {
        $this->registrationDate = $registrationDate;

        return $this;
    }

    /**
     * Accesseur des rôles du joueur.
     *
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
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
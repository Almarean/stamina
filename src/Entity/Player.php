<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Player.
 *
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 *
 * @category Symfony4
 * @package  App\Entity
 * @author   Display Name <thomaslaure3@gmail.com>
 * @license  https://www.gnu.org/licenses/license-list.fr.html GPL
 * @link     https://symfony.com/
 */
class Player
{
    /**
     * ID du joueur.
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Pseudo du joueur.
     *
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * Adresse e-mail du joueur.
     *
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * Mot de passe du joueur.
     *
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * Accesseur de l'ID du joueur.
     *
     * @return integer|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Accesseur du pseudo du joueur.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Mutateur du pseudo du joueur.
     *
     * @param string $name Pseudo à attribuer au joueur.
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Accesseur de l'adresse e-mail du joueur.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Mutateur de l'adresse e-mail du joueur.
     *
     * @param string $email Adresse e-mail à attribuer au joueur.
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Accesseur du mot de passe de l'utilisateur.
     *
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Mutateur du mot de passe de l'utilisateur.
     *
     * @param string $password Mot de passe à attribuer à l'utilisateur.
     *
     * @return self
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
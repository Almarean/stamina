<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

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
class Player implements UserInterface
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
     *
     * @Assert\Email()
     */
    private $email;

    /**
     * Mot de passe du joueur.
     *
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * Mot de passe de confirmation du joueur.
     */
    private $repeatPassword;

    /**
     * Rôles attribués au joueur.
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
     * Accesseur du mot de passe du joueur.
     *
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Mutateur du mot de passe du joueur.
     *
     * @param string $password Mot de passe à attribuer au joueur.
     *
     * @return self
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Accesseur du mot de passe de confirmation du joueur.
     *
     * @return string|null
     */
    public function getRepeatPassword(): ?string
    {
        return $this->repeatPassword;
    }

    /**
     * Mutateur du mot de passe de confirmation du joueur.
     *
     * @param string $password Mot de passe de confirmation à attribuer au joueur.
     *
     * @return self
     */
    public function setRepeatPassword(string $repeatPassword): self
    {
        $this->repeatPassword = $repeatPassword;

        return $this;
    }

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
     * @param \DateTimeInterface $registrationDate Date de création du compte à attribuer au joueur.
     *
     * @return self
     */
    public function setRegistrationDate(\DateTimeInterface $registrationDate): self
    {
        $this->registrationDate = $registrationDate;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        /*$roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';
        return [array_unique($roles)];*/
        return ['ROLE_USER'];
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\DiscriminatorColumn;

/**
 * Abstract class User.
 *
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 *
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap({"player" = "Player", "admin" = "Admin"})
 */
abstract class User implements UserInterface
{
    /**
     * ID de l'utilisateur.
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Pseudo de l'utilisateur.
     *
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * Adresse e-mail de l'utilisateur.
     *
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\Email()
     */
    private $email;

    /**
     * Mot de passe de l'utilisateur.
     *
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * Mot de passe de confirmation de l'utilisateur.
     */
    private $repeatPassword;

    /**
     * Accesseur de l'ID de l'utilisateur.
     *
     * @return integer|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Accesseur du pseudo de l'utilisateur.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Mutateur du pseudo de l'utilisateur.
     *
     * @param string $name Pseudo à attribuer à l'utilisateur.
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Accesseur de l'adresse e-mail de l'utilisateur.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Mutateur de l'adresse e-mail de l'utilisateur.
     *
     * @param string $email Adresse e-mail à attribuer à l'utilisateur.
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

    /**
     * Accesseur du mot de passe de confirmation de l'utilisateur.
     *
     * @return string|null
     */
    public function getRepeatPassword(): ?string
    {
        return $this->repeatPassword;
    }

    /**
     * Mutateur du mot de passe de confirmation de l'utilisateur.
     *
     * @param string $password Mot de passe de confirmation à attribuer à l'utilisateur.
     *
     * @return self
     */
    public function setRepeatPassword(string $repeatPassword): self
    {
        $this->repeatPassword = $repeatPassword;

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
<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Contact.
 */
class Contact
{
    /**
     * Nom de la personne qui nous contacte.
     *
     * @var string|null
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $name;

    /**
     * Prénom de la personne du contact.
     *
     * @var string|null
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $firstName;

    /**
     * Adresse e-mail de la personne du contact.
     *
     * @var string|null
     *
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * Objet du contact.
     *
     * @var string|null
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $subject;

    /**
     * Message du contact.
     *
     * @var string|null
     *
     * @Assert\NotBlank()
     */
    private $message;

    /**
     * Accesseur du nom de la personne du contact.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Mutateur du nom de la personne du contact.
     *
     * @param string $name Nom à attribuer à la personne du contact.
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Accesseur du prénom de la personne du contact.
     *
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Mutateur du prénom de la personne du contact.
     *
     * @param string $firstName Prénom à attribuer à la personne du contact.
     *
     * @return self
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Acesseur de l'adresse e-mail de la personne du contact.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Mutateur de l'adresse e-mail de la personne du contact.
     *
     * @param string $email Adresse e-mail à attribuer à la personne du contact.
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Accesseur de l'objet du contact.
     *
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * Mutateur de l'objet du contact.
     *
     * @param string $subject Objet à attribuer au contact.
     *
     * @return self
     */
    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Accesseur du message du contact.
     *
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * Mutateur du message du contact.
     *
     * @param string $message Message à attribuer au contact.
     *
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
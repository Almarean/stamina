<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;

/**
 * Abstract class Item.
 *
 * @MappedSuperclass
 *
 * @category Symfony4
 * @package  App\Entity
 * @author   Display Name <thomaslaure3@gmail.com>
 * @license  https://www.gnu.org/licenses/license-list.fr.html GPL
 * @link     https://symfony.com/
 */
abstract class Item
{
    /**
     * ID de l'item.
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Nom de l'item.
     *
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * Image de l'item.
     *
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * Description de l'item.
     *
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * Accesseur de l'ID de l'item.
     *
     * @return integer|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Accesseur du nom de l'item.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Mutateur du nom de l'item.
     *
     * @param string $name Nom à attribuer à l'item.
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Accesseur de l'image de l'item.
     *
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * Mutateur de l'image de l'item.
     *
     * @param string $image Image à attribuer à l'item.
     *
     * @return self
     */
    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Accesseur de la descritpion de l'item.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Mutateur de la description de l'item.
     *
     * @param string $description Description à attribuer à l'item.
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
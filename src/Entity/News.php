<?php

namespace App\Entity;

use App\Entity\Item;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class News extends Item.
 *
 * @ORM\Entity(repositoryClass="App\Repository\NewsRepository")
 *
 * @category Symfony4
 * @package  App\Entity
 * @author   Display Name <thomaslaure3@gmail.com>
 * @license  https://www.gnu.org/licenses/license-list.fr.html GPL
 * @link     https://symfony.com/
 */
class News extends Item
{
    /**
     * Date de publication de l'actualité.
     *
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * Résumé de l'actualité.
     *
     * @ORM\Column(type="text")
     */
    private $abstract;

    /**
     * Accesseur de la date de publication de l'actualité.
     *
     * @return \DateTimeInterface|null
     */
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    /**
     * Mutateur de la date de publication de l'actualité.
     *
     * @param \DateTimeInterface $date Date de publication à attribuer à l'actualité.
     *
     * @return self
     */
    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Accesseur du résumé de l'actualité.
     *
     * @return string|null
     */
    public function getAbstract(): ?string
    {
        return $this->abstract;
    }

    /**
     * Mutateur du résumé de l'actualité.
     *
     * @param string $abstract Résumé à attribuer à l'actualité.
     *
     * @return self
     */
    public function setAbstract(string $abstract): self
    {
        $this->abstract = $abstract;

        return $this;
    }
}
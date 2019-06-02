<?php

namespace App\Entity;

use App\Entity\Item;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Zone extends Item.
 *
 * @ORM\Entity(repositoryClass="App\Repository\ZoneRepository")
 *
 * @category Symfony4
 * @package  App\Entity
 * @author   Display Name <thomaslaure3@gmail.com>
 * @license  https://www.gnu.org/licenses/license-list.fr.html GPL
 * @link     https://symfony.com/
 */
class Zone extends Item
{
    /**
     * Monstres de la zone.
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Monster", mappedBy="zone")
     */
    private $monsters;

    /**
     * Zone constructor.
     */
    public function __construct()
    {
        $this->monsters = new ArrayCollection();
    }

    /**
     * Accesseur de la liste des monstres de la zone.
     *
     * @return Collection|Monster[]
     */
    public function getMonsters(): Collection
    {
        return $this->monsters;
    }

    /**
     * Ajoute un monstre dans la zone.
     *
     * @param Monster $monster Monstre à ajouter à la zone.
     *
     * @return self
     */
    public function addMonster(Monster $monster): self
    {
        if (!$this->monsters->contains($monster)) {
            $this->monsters[] = $monster;
            $monster->setZone($this);
        }

        return $this;
    }

    /**
     * Supprime un monstre de la zone.
     *
     * @param Monster $monster Monstre à supprimer de la zone.
     *
     * @return self
     */
    public function removeMonster(Monster $monster): self
    {
        if ($this->monsters->contains($monster)) {
            $this->monsters->removeElement($monster);
            // set the owning side to null (unless already changed)
            if ($monster->getZone() === $this) {
                $monster->setZone(null);
            }
        }

        return $this;
    }
}
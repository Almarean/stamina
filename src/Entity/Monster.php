<?php

namespace App\Entity;

use App\Entity\Item;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Monster extends Item.
 *
 * @ORM\Entity(repositoryClass="App\Repository\MonsterRepository")
 *
 * @category Symfony4
 * @package  App\Entity
 * @author   Display Name <thomaslaure3@gmail.com>
 * @license  https://www.gnu.org/licenses/license-list.fr.html GPL
 * @link     https://symfony.com/
 */
class Monster extends Item
{
    /**
     * Zone du monstre.
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Zone", inversedBy="monsters")
     */
    private $zone;

    /**
     * Accesseur de la zone du monstre.
     *
     * @return Zone|null
     */
    public function getZone(): ?Zone
    {
        return $this->zone;
    }

    /**
     * Mutateur de la zone du monstre.
     *
     * @param Zone|null $zone Zone à attribuer au monstre.
     *
     * @return self
     */
    public function setZone(?Zone $zone): self
    {
        $this->zone = $zone;

        return $this;
    }
}
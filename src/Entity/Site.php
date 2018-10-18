<?php

declare(strict_types=1);

namespace App\Entity;


use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(attributes={
 *     "normalization_context"={"groups"={"site"}},
 *     "denormalization_context"={"groups"={"edit_site"}}
 * })
 */
class Site
{
    /**
     * @var int
     * @Groups({"site", "tee"})
     */
    private $id;

    /**
     * @var string
     * @Groups({"site", "edit_site"})
     */
    private $url;

    /**
     * @var string
     * @Groups({"site", "tee"})
     */
    private $logoImage;

    /**
     * @var string
     * @Groups({"site", "edit_site"})
     */
    private $name;

    /**
     * @var Collection | Tee[]
     * @Groups({"site"})
     */
    private $tees;

    public function __construct()
    {
        $this->tees = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getLogoImage(): string
    {
        return $this->logoImage;
    }

    /**
     * @param string $logoImage
     */
    public function setLogoImage(string $logoImage): void
    {
        $this->logoImage = $logoImage;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Tee[]|ArrayCollection
     */
    public function getTees() : Collection
    {
        return $this->tees;
    }

    /**
     * @param Tee[]|ArrayCollection $tees
     */
    public function setTees($tees): void
    {
        $this->tees = $tees;
    }

    /**
     * @param Tee $tee
     */
    public function addTee(Tee $tee) : void
    {
        if(!$this->tees->contains($tee)) {
            $this->tees->add($tee);
            if($tee->getSite() !== $this){
                $tee->setSite($this);
            }
        }
    }

    /**
     * @param Tee $tee
     * @return bool
     */
    public function removeTee(Tee $tee) : bool
    {
        return $this->tees->removeElement($tee);
    }

}
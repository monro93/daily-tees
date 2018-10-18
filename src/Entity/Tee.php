<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
* @ApiResource(attributes={
 *     "normalization_context"={"groups"={"tee"}},
 *     "denormalization_context"={"groups"={"edit_tee"}}
 * })
 */
class Tee
{
    /**
     * @var int
     * @Groups({"tee", "site"})
     */
    private $id;

    /**
     * @var string
     * @Groups({"tee", "edit_tee"})
     */
    private $name;

    /**
     * @var Site
     * @Groups({"tee", "edit_tee"})
     */
    private $site;

    /**
     * @var string
     * @Groups({"tee", "edit_tee"})
     */
    private $picture;

    /**
     * @var int
     * @Groups({"tee", "edit_tee"})
     */
    private $price;

    /**
     * @var string
     * @Groups({"tee", "edit_tee"})
     */
    private $url;

    /**
     * @var \DateTime
     * @Groups({"tee", "edit_tee"})
     */
    private $expiresOn;

    /**
     * @var bool
     * @Groups({"tee"})
     */
    private $expired = false;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }


    /**
     * @return Site
     */
    public function getSite() : Site
    {
        return $this->site;
    }

    /**
     * @param Site $site
     */
    public function setSite(Site $site): void
    {
        $this->site = $site;
        $this->site->addTee($this);
    }

    /**
     * @return string
     */
    public function getPicture(): string
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     */
    public function setPicture(string $picture): void
    {
        $this->picture = $picture;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        if(!$this->url) {
            return $this->site->getUrl();
        }
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
     * @return \DateTime
     */
    public function getExpiresOn(): \DateTime
    {
        return $this->expiresOn;
    }

    /**
     * @param \DateTime $expiresOn
     */
    public function setExpiresOn(\DateTime $expiresOn): void
    {
        $this->expiresOn = $expiresOn;
    }

    /**
     * @return bool
     */
    public function isExpired(): bool
    {
        return $this->expired;
    }

    /**
     * @param bool $expired
     */
    public function setExpired(bool $expired): void
    {
        $this->expired = $expired;
    }

}
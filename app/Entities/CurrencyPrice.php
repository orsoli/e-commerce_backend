<?php

namespace App\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'currency_price')]
class CurrencyPrice
{
    #[Id]
    #[Column(type: 'bigint', options: ['unsigned' => true, 'primary'=>true])]
    #[GeneratedValue]
    private $id;

    #[ManyToOne(targetEntity: 'Price')]
    #[JoinColumn(name: 'price', referencedColumnName: 'amount')]
    private $price;

    #[ManyToOne(targetEntity: 'Currency')]
    #[JoinColumn(name: 'currency', referencedColumnName: 'label')]
    private $currency;

    #[Column(name: '__typename', type: 'string', length: 255)]
    private $typeName;

    #[Column(type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'], nullable: false)]
    private $createdAt;

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setPrice(?Price $price): void
    {
        $this->price = $price;
    }

    public function getPrice(): ?Price
    {
        return $this->price;
    }

    public function setCurrency(?Currency $currency): void
    {
        $this->currency = $currency;
    }

    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    public function setTypeName(string $typeName): void
    {
        $this->typeName = $typeName;
    }

    public function getTypeName(): string
    {
        return $this->typeName;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
}
?>
<?php

namespace App\Entities;

use Doctrine\ORM\Mapping\UniqueConstraint;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'product_prices', uniqueConstraints: [
    new UniqueConstraint(name: 'unique_product_currency', columns: ['product_id', 'currency_id'])
])]
class ProductPrice
{
    #[Id]
    #[Column(type: 'bigint', options:['unsigned' => true, 'primary' => true])]
    #[GeneratedValue]
    private $id;

    #[ManyToOne(targetEntity: 'Product')]
    #[JoinColumn(name: 'product_id', referencedColumnName: 'id', nullable: false)]
    private $product;

    #[ManyToOne(targetEntity: 'Currency')]
    #[JoinColumn(name: 'currency_id', referencedColumnName: 'id', nullable: false)]
    private $currencyId;
    
    #[Column(type: 'decimal', precision: 8, scale: 2, options: ['unsigned' => true])]
    private $amount;

    #[Column(name: '__typename', type: 'string', length: 255, nullable: false)]
    private $typeName;

    #[Column(type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP', 'onUpdate' => 'CURRENT_TIMESTAMP'])]
    private $createdAt;

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setProduct(?Product $product): void
    {
        $this->product = $product;
    }

    public function getProductId(): ?Product
    {
        return $this->product;
    }

    public function setCurrency(?Currency $currencyId): void
    {
        $this->currencyId = $currencyId;
    }

    public function getCurrencyId(): ?Currency
    {
        return $this->currencyId;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setTypeName(string $typeName): void
    {
        $this->typeName = $typeName;
    }

    public function getTypeName(): ?string
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
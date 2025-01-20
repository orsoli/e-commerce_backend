<?php

namespace App\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'prices')]
class Price
{
    #[Id]
    #[Column(type: 'decimal', precision: 8, scale: 2, options: ['unsigned' => true, 'primary' => true])]
    private $amount;

    #[Column(name: '__typename', type: 'string', length: 255, nullable: false)]
    private $typeName;

    #[Column(type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP', 'onUpdate' => 'CURRENT_TIMESTAMP'])]
    private $createdAt;

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
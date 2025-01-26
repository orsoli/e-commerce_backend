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
#[Table(name: 'attribute_product')]
class AttributeProduct
{
    #[Id]
    #[Column(type: 'bigint', nullable: false, options: ['unsigned' => true])]
    #[GeneratedValue]
    private $id;

    #[ManyToOne(targetEntity: 'Product')]
    #[JoinColumn(name: 'product_id', referencedColumnName: 'id', nullable: false)]
    private $product;

    #[ManyToOne(targetEntity: 'Attribute')]
    #[JoinColumn(name: 'attribute_id', referencedColumnName: 'id', nullable: false)]
    private $attribute;

    #[Column(name: '__typename', type: 'string', length: 255)]
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

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setAttribute(?Attribute $attribute): void
    {
        $this->attribute = $attribute;
    }

    public function getAttribute(): ?Attribute
    {
        return $this->attribute;
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
?>
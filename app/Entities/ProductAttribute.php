<?php

namespace App\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'product_attributes')]
class ProductAttribute
{
    #[Id]
    #[Column(type: 'string', length: 255, options:['primary' => true])]
    private $id;

    #[ManyToOne(targetEntity: 'Product')]
    #[JoinColumn(name: 'product_id', referencedColumnName: 'id', nullable: false )]
    private $product;

    #[Column(type: 'string',length:255)]
    private $name;

    #[Column(name:'attribute_type', type: 'string', length:255)]
    private $attributeType;

    #[Column(name: '__typename', type: 'string', length: 255)]
    private $typeName;

    #[Column(type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP', 'onUpdate' => 'CURRENT_TIMESTAMP'])]
    private $createdAt;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?string
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

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setAttributeType(string $type): void
    {
        $this->attributeType = $type;
    }

    public function getAttributeType(): ?string
    {
        return $this->attributeType;
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
<?php

namespace App\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'attribute_items')]
class AttributeItem
{
    #[Id]
    #[Column(type: 'string', length: 255)]
    private $id;

    #[ManyToOne(targetEntity: 'ProductAttribute')]
    #[JoinColumn(name: 'attribute_id', referencedColumnName: 'id')]
    private $attributeId;

    #[Column(type: 'string', length: 255)]
    private $displayValue;

    #[Column(type: 'string', length: 255)]
    private $value;

    #[Column(name: '__typename', type: 'string', length: 255)]
    private $typeName;

    #[Column(type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP', 'onUpdate' => 'CURRENT_TIMESTAMP'], nullable: false)]
    private $createdAt;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setAttribute(?ProductAttribute $attributeId): void
    {
        $this->attributeId = $attributeId;
    }

    public function getAttribute(): ?ProductAttribute
    {
        return $this->attributeId;
    }

    public function setDisplayValue(string $displayValue): void
    {
        $this->displayValue = $displayValue;
    }

    public function getDisplayValue(): string
    {
        return $this->displayValue;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
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
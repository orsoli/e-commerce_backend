<?php

namespace App\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'products')]
class Product
{
    #[Id]
    #[Column(type: 'string', length: 255, nullable: false, options: ['primary' => true])]
    private $id;

    #[Column(type: 'string', length: 255, unique: true)]
    private $name;

    #[Column(type: 'boolean')]
    private $inStock;

    #[Column(type: 'text', nullable: true)]
    private $description;

    #[ManyToOne(targetEntity: 'Price')]
    #[JoinColumn(name: 'price', referencedColumnName: 'amount', nullable: false, options: ['unsigned' => true])]
    private $price;

    #[ManyToOne(targetEntity: 'Category')]
    #[JoinColumn(name: 'category', referencedColumnName: 'name', nullable: false)]
    private $category;

    #[Column(type: 'string', length: 255, nullable: true)]
    private $brand;

    #[Column(name: '__typename', type: 'string', length: 255, nullable: false)]
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

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setInStock(bool $inStock): void
    {
        $this->inStock = $inStock;
    }

    public function getInStock(): bool
    {
        return $this->inStock;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setCategory(?Category $category): void
    {
        $this->category = $category;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setBrand(?string $brand): void
    {
        $this->brand = $brand;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setTypeName(?string $typeName): void
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
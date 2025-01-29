<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250129001014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE attribute_items (id VARCHAR(255) NOT NULL, displayValue VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, __typename VARCHAR(255) NOT NULL, createdAt DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, attribute_id VARCHAR(255) DEFAULT NULL, INDEX IDX_2260AFBB6E62EFA (attribute_id), PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE categories (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, __typename VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, UNIQUE INDEX UNIQ_3AF346685E237E06 (name), PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE currencies (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, symbol VARCHAR(255) NOT NULL, __typename VARCHAR(255) NOT NULL, createdAt DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, UNIQUE INDEX UNIQ_37C44693EA750E8 (label), PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE product_attributes (id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, attribute_type VARCHAR(255) NOT NULL, __typename VARCHAR(255) NOT NULL, createdAt DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, product_id VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_A2FCC15B5E237E06 (name), INDEX IDX_A2FCC15B4584665A (product_id), PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE product_images (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, url LONGTEXT NOT NULL, createdAt DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, product_id VARCHAR(255) NOT NULL, INDEX IDX_8263FFCE4584665A (product_id), PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE product_prices (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, amount NUMERIC(8, 2) UNSIGNED NOT NULL, __typename VARCHAR(255) NOT NULL, createdAt DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, product_id VARCHAR(255) NOT NULL, currency_label VARCHAR(255) NOT NULL, INDEX IDX_86B72CFD4584665A (product_id), INDEX IDX_86B72CFD5945528E (currency_label), PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE products (id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, in_stock TINYINT(1) NOT NULL, description LONGTEXT DEFAULT NULL, brand VARCHAR(255) DEFAULT NULL, __typename VARCHAR(255) NOT NULL, createdAt DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, category_name VARCHAR(255) NOT NULL, INDEX IDX_B3BA5A5AD5B80441 (category_name), PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE attribute_items ADD CONSTRAINT FK_2260AFBB6E62EFA FOREIGN KEY (attribute_id) REFERENCES product_attributes (id)');
        $this->addSql('ALTER TABLE product_attributes ADD CONSTRAINT FK_A2FCC15B4584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE product_images ADD CONSTRAINT FK_8263FFCE4584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE product_prices ADD CONSTRAINT FK_86B72CFD4584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE product_prices ADD CONSTRAINT FK_86B72CFD5945528E FOREIGN KEY (currency_label) REFERENCES currencies (label)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5AD5B80441 FOREIGN KEY (category_name) REFERENCES categories (name)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attribute_items DROP FOREIGN KEY FK_2260AFBB6E62EFA');
        $this->addSql('ALTER TABLE product_attributes DROP FOREIGN KEY FK_A2FCC15B4584665A');
        $this->addSql('ALTER TABLE product_images DROP FOREIGN KEY FK_8263FFCE4584665A');
        $this->addSql('ALTER TABLE product_prices DROP FOREIGN KEY FK_86B72CFD4584665A');
        $this->addSql('ALTER TABLE product_prices DROP FOREIGN KEY FK_86B72CFD5945528E');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5AD5B80441');
        $this->addSql('DROP TABLE attribute_items');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE currencies');
        $this->addSql('DROP TABLE product_attributes');
        $this->addSql('DROP TABLE product_images');
        $this->addSql('DROP TABLE product_prices');
        $this->addSql('DROP TABLE products');
    }
}

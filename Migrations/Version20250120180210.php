<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250120180210 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE attribute_product (id BIGINT UNSIGNED NOT NULL, __typename VARCHAR(255) NOT NULL, createdAt DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, product_id VARCHAR(255) NOT NULL, attribute_id VARCHAR(255) NOT NULL, INDEX IDX_58D65D694584665A (product_id), INDEX IDX_58D65D69B6E62EFA (attribute_id), PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE attributes (id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, __typename VARCHAR(255) NOT NULL, createdAt DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, UNIQUE INDEX UNIQ_319B9E705E237E06 (name), PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE categories (name VARCHAR(255) NOT NULL, __typename VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(name))');
        $this->addSql('CREATE TABLE currency (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, symbol VARCHAR(255) NOT NULL, __typename VARCHAR(255) NOT NULL, createdAt DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE currency_price (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, price NUMERIC(8, 2) UNSIGNED NOT NULL, __typename VARCHAR(255) NOT NULL, createdAt DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, currency_id BIGINT UNSIGNED AUTO_INCREMENT DEFAULT NULL, INDEX IDX_9D2A20BF38248176 (currency_id), PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE gallery (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, url LONGTEXT NOT NULL, __typename VARCHAR(255) NOT NULL, createdAt DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, product_id VARCHAR(255) NOT NULL, INDEX IDX_472B783A4584665A (product_id), PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE items (id VARCHAR(255) NOT NULL, displayValue VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, __typename VARCHAR(255) NOT NULL, createdAt DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, attribute_id VARCHAR(255) DEFAULT NULL, INDEX IDX_E11EE94DB6E62EFA (attribute_id), PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE prices (amount NUMERIC(8, 2) UNSIGNED NOT NULL, __typename VARCHAR(255) NOT NULL, createdAt DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(amount))');
        $this->addSql('CREATE TABLE products (id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, inStock TINYINT(1) NOT NULL, description LONGTEXT DEFAULT NULL, brand VARCHAR(255) DEFAULT NULL, __typename VARCHAR(255) NOT NULL, createdAt DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, price NUMERIC(8, 2) UNSIGNED NOT NULL, category VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B3BA5A5A5E237E06 (name), INDEX IDX_B3BA5A5ACAC822D9 (price), INDEX IDX_B3BA5A5A64C19C1 (category), PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE attribute_product ADD CONSTRAINT FK_58D65D694584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE attribute_product ADD CONSTRAINT FK_58D65D69B6E62EFA FOREIGN KEY (attribute_id) REFERENCES attributes (id)');
        $this->addSql('ALTER TABLE currency_price ADD CONSTRAINT FK_9D2A20BF38248176 FOREIGN KEY (currency_id) REFERENCES currency (id)');
        $this->addSql('ALTER TABLE gallery ADD CONSTRAINT FK_472B783A4584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE items ADD CONSTRAINT FK_E11EE94DB6E62EFA FOREIGN KEY (attribute_id) REFERENCES attributes (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5ACAC822D9 FOREIGN KEY (price) REFERENCES prices (amount)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A64C19C1 FOREIGN KEY (category) REFERENCES categories (name)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attribute_product DROP FOREIGN KEY FK_58D65D694584665A');
        $this->addSql('ALTER TABLE attribute_product DROP FOREIGN KEY FK_58D65D69B6E62EFA');
        $this->addSql('ALTER TABLE currency_price DROP FOREIGN KEY FK_9D2A20BF38248176');
        $this->addSql('ALTER TABLE gallery DROP FOREIGN KEY FK_472B783A4584665A');
        $this->addSql('ALTER TABLE items DROP FOREIGN KEY FK_E11EE94DB6E62EFA');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5ACAC822D9');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A64C19C1');
        $this->addSql('DROP TABLE attribute_product');
        $this->addSql('DROP TABLE attributes');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE currency');
        $this->addSql('DROP TABLE currency_price');
        $this->addSql('DROP TABLE gallery');
        $this->addSql('DROP TABLE items');
        $this->addSql('DROP TABLE prices');
        $this->addSql('DROP TABLE products');
    }
}

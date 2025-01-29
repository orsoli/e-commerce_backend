<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250129160633 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_prices (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, amount NUMERIC(8, 2) UNSIGNED NOT NULL, __typename VARCHAR(255) NOT NULL, createdAt DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, product_id VARCHAR(255) NOT NULL, currency_id BIGINT UNSIGNED NOT NULL, INDEX IDX_86B72CFD4584665A (product_id), INDEX IDX_86B72CFD38248176 (currency_id), PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE product_prices ADD CONSTRAINT FK_86B72CFD4584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE product_prices ADD CONSTRAINT FK_86B72CFD38248176 FOREIGN KEY (currency_id) REFERENCES currencies (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_prices DROP FOREIGN KEY FK_86B72CFD4584665A');
        $this->addSql('ALTER TABLE product_prices DROP FOREIGN KEY FK_86B72CFD38248176');
        $this->addSql('DROP TABLE product_prices');
    }
}

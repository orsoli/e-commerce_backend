<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250129161109 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE attribute_items (id VARCHAR(255) NOT NULL, displayValue VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, __typename VARCHAR(255) NOT NULL, createdAt DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, attribute_id VARCHAR(255) DEFAULT NULL, INDEX IDX_2260AFBB6E62EFA (attribute_id), PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE attribute_items ADD CONSTRAINT FK_2260AFBB6E62EFA FOREIGN KEY (attribute_id) REFERENCES product_attributes (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attribute_items DROP FOREIGN KEY FK_2260AFBB6E62EFA');
        $this->addSql('DROP TABLE attribute_items');
    }
}

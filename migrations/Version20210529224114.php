<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210529224114 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE business_cities ADD CONSTRAINT FK_82FDFE918BAC62AF FOREIGN KEY (city_id) REFERENCES business (id)');
        $this->addSql('ALTER TABLE business_cities ADD CONSTRAINT FK_82FDFE91A89DB457 FOREIGN KEY (business_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE traveller CHANGE gender gender VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE business_cities DROP FOREIGN KEY FK_82FDFE918BAC62AF');
        $this->addSql('ALTER TABLE business_cities DROP FOREIGN KEY FK_82FDFE91A89DB457');
        $this->addSql('ALTER TABLE traveller CHANGE gender gender LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}

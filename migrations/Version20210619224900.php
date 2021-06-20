<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210619224900 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE travel_plan (id INT AUTO_INCREMENT NOT NULL, traveller_id INT DEFAULT NULL, city_id INT DEFAULT NULL, start_date DATETIME DEFAULT NULL, end_date DATETIME DEFAULT NULL, time_allocated_per_day INT DEFAULT NULL, plan JSON DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_1602B8D0E58489A0 (traveller_id), INDEX IDX_1602B8D08BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE travel_plan ADD CONSTRAINT FK_1602B8D0E58489A0 FOREIGN KEY (traveller_id) REFERENCES traveller (id)');
        $this->addSql('ALTER TABLE travel_plan ADD CONSTRAINT FK_1602B8D08BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE travel_plan');
    }
}

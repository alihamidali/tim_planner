<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210608101156 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE traveller_cities (traveller_id INT NOT NULL, city_id INT NOT NULL, INDEX IDX_26923279E58489A0 (traveller_id), INDEX IDX_269232798BAC62AF (city_id), PRIMARY KEY(traveller_id, city_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE traveller_cities ADD CONSTRAINT FK_26923279E58489A0 FOREIGN KEY (traveller_id) REFERENCES traveller (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE traveller_cities ADD CONSTRAINT FK_269232798BAC62AF FOREIGN KEY (city_id) REFERENCES city (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE traveller_cities');
    }
}

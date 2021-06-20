<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210608113807 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE destination ADD point_of_interest VARCHAR(300) DEFAULT NULL, ADD address LONGTEXT DEFAULT NULL, ADD longitude VARCHAR(300) DEFAULT NULL, ADD latitude VARCHAR(300) DEFAULT NULL, ADD week_start_day VARCHAR(300) DEFAULT NULL, ADD week_end_day VARCHAR(300) DEFAULT NULL, ADD tickets VARCHAR(300) DEFAULT NULL, ADD phone VARCHAR(300) DEFAULT NULL, ADD description2 LONGTEXT DEFAULT NULL, CHANGE name name VARCHAR(300) DEFAULT NULL, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE opening_time opening_time VARCHAR(30) DEFAULT NULL, CHANGE closing_time closing_time VARCHAR(30) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE destination DROP point_of_interest, DROP address, DROP longitude, DROP latitude, DROP week_start_day, DROP week_end_day, DROP tickets, DROP phone, DROP description2, CHANGE name name VARCHAR(300) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(1000) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE opening_time opening_time VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE closing_time closing_time VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}

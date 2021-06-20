<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210614225001 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE destination ADD is_open_on_monday TINYINT(1) DEFAULT NULL, ADD is_open_on_tuesday TINYINT(1) DEFAULT NULL, ADD is_open_on_wednesday TINYINT(1) DEFAULT NULL, ADD is_open_on_thursday TINYINT(1) DEFAULT NULL, ADD is_open_on_friday TINYINT(1) DEFAULT NULL, ADD is_open_on_saturday TINYINT(1) DEFAULT NULL, ADD is_open_on_sunday TINYINT(1) DEFAULT NULL, ADD monday_open_time TIME DEFAULT NULL, ADD tuesday_open_time TIME DEFAULT NULL, ADD wednesday_open_time TIME DEFAULT NULL, ADD thursday_open_time TIME DEFAULT NULL, ADD friday_open_time TIME DEFAULT NULL, ADD saturday_open_time TIME DEFAULT NULL, ADD sunday_open_time TIME DEFAULT NULL, ADD monday_close_time TIME DEFAULT NULL, ADD tuesday_close_time TIME DEFAULT NULL, ADD wednesday_close_time TIME DEFAULT NULL, ADD thursday_close_time TIME DEFAULT NULL, ADD friday_close_time TIME DEFAULT NULL, ADD saturday_close_time TIME DEFAULT NULL, ADD sunday_close_time TIME DEFAULT NULL, DROP opening_time, DROP closing_time, DROP week_start_day, DROP week_end_day');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE destination ADD opening_time VARCHAR(30) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD closing_time VARCHAR(30) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD week_start_day VARCHAR(300) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD week_end_day VARCHAR(300) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP is_open_on_monday, DROP is_open_on_tuesday, DROP is_open_on_wednesday, DROP is_open_on_thursday, DROP is_open_on_friday, DROP is_open_on_saturday, DROP is_open_on_sunday, DROP monday_open_time, DROP tuesday_open_time, DROP wednesday_open_time, DROP thursday_open_time, DROP friday_open_time, DROP saturday_open_time, DROP sunday_open_time, DROP monday_close_time, DROP tuesday_close_time, DROP wednesday_close_time, DROP thursday_close_time, DROP friday_close_time, DROP saturday_close_time, DROP sunday_close_time');
    }
}

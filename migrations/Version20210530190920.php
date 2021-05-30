<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210530190920 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE traveller_cities (city_id INT NOT NULL, business_id INT NOT NULL, INDEX IDX_269232798BAC62AF (city_id), INDEX IDX_26923279A89DB457 (business_id), PRIMARY KEY(city_id, business_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE traveller_cities ADD CONSTRAINT FK_269232798BAC62AF FOREIGN KEY (city_id) REFERENCES traveller (id)');
        $this->addSql('ALTER TABLE traveller_cities ADD CONSTRAINT FK_26923279A89DB457 FOREIGN KEY (business_id) REFERENCES city (id)');
        $this->addSql('DROP TABLE business_cities');
        $this->addSql('ALTER TABLE business ADD city_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE business ADD CONSTRAINT FK_8D36E388BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('CREATE INDEX IDX_8D36E388BAC62AF ON business (city_id)');
        $this->addSql('ALTER TABLE traveller ADD favorite_hangout_place_id INT DEFAULT NULL, ADD favorite_cuisine VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE traveller ADD CONSTRAINT FK_92E7B427CA7863C1 FOREIGN KEY (favorite_hangout_place_id) REFERENCES sector (id)');
        $this->addSql('CREATE INDEX IDX_92E7B427CA7863C1 ON traveller (favorite_hangout_place_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE business_cities (city_id INT NOT NULL, business_id INT NOT NULL, INDEX IDX_82FDFE918BAC62AF (city_id), INDEX IDX_82FDFE91A89DB457 (business_id), PRIMARY KEY(city_id, business_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE business_cities ADD CONSTRAINT FK_82FDFE918BAC62AF FOREIGN KEY (city_id) REFERENCES business (id)');
        $this->addSql('ALTER TABLE business_cities ADD CONSTRAINT FK_82FDFE91A89DB457 FOREIGN KEY (business_id) REFERENCES city (id)');
        $this->addSql('DROP TABLE traveller_cities');
        $this->addSql('ALTER TABLE business DROP FOREIGN KEY FK_8D36E388BAC62AF');
        $this->addSql('DROP INDEX IDX_8D36E388BAC62AF ON business');
        $this->addSql('ALTER TABLE business DROP city_id');
        $this->addSql('ALTER TABLE traveller DROP FOREIGN KEY FK_92E7B427CA7863C1');
        $this->addSql('DROP INDEX IDX_92E7B427CA7863C1 ON traveller');
        $this->addSql('ALTER TABLE traveller DROP favorite_hangout_place_id, DROP favorite_cuisine');
    }
}

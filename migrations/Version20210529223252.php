<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210529223252 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE business_cities (city_id INT NOT NULL, business_id INT NOT NULL, INDEX IDX_82FDFE918BAC62AF (city_id), INDEX IDX_82FDFE91A89DB457 (business_id), PRIMARY KEY(city_id, business_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE business_cities ADD CONSTRAINT FK_82FDFE918BAC62AF FOREIGN KEY (city_id) REFERENCES business (id)');
        $this->addSql('ALTER TABLE business_cities ADD CONSTRAINT FK_82FDFE91A89DB457 FOREIGN KEY (business_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE business DROP FOREIGN KEY FK_8D36E388BAC62AF');
        $this->addSql('ALTER TABLE business DROP FOREIGN KEY FK_8D36E38F92F3E70');
        $this->addSql('DROP INDEX IDX_8D36E388BAC62AF ON business');
        $this->addSql('DROP INDEX IDX_8D36E38F92F3E70 ON business');
        $this->addSql('ALTER TABLE business ADD nationality_id INT DEFAULT NULL, ADD email VARCHAR(300) NOT NULL, ADD mobile_no VARCHAR(20) NOT NULL, ADD address2 VARCHAR(500) DEFAULT NULL, ADD address3 VARCHAR(500) DEFAULT NULL, DROP city_id, DROP country_id, DROP first_name, DROP last_name, DROP email_address, DROP mobile_number, DROP company_number, DROP address_two, DROP address_three, CHANGE sector_id sector_id INT DEFAULT NULL, CHANGE roles phone_no LONGTEXT NOT NULL, CHANGE address_one address1 VARCHAR(500) NOT NULL');
        $this->addSql('ALTER TABLE business ADD CONSTRAINT FK_8D36E381C9DA55 FOREIGN KEY (nationality_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_8D36E38F92F3E70 ON business (nationality_id)');
        $this->addSql('ALTER TABLE destination CHANGE city_id city_id INT DEFAULT NULL, CHANGE country_id country_id INT DEFAULT NULL, CHANGE sector_id sector_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE traveller DROP top_destinations, DROP favourite_hangout, DROP favourite_cuisine, DROP dream_holiday, CHANGE traveller_category_id traveller_category_id INT DEFAULT NULL, CHANGE nationality_id nationality_id INT DEFAULT NULL, CHANGE date_of_birth date_of_birth DATETIME NOT NULL, CHANGE gender gender LONGTEXT NOT NULL, CHANGE email_address email VARCHAR(300) NOT NULL, CHANGE mobile_number mobile_no VARCHAR(20) NOT NULL, CHANGE roles phone_no LONGTEXT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE business_cities');
        $this->addSql('ALTER TABLE business DROP FOREIGN KEY FK_8D36E381C9DA55');
        $this->addSql('DROP INDEX IDX_8D36E38F92F3E70 ON business');
        $this->addSql('ALTER TABLE business ADD city_id INT NOT NULL, ADD country_id INT NOT NULL, ADD last_name VARCHAR(300) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD email_address VARCHAR(300) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD company_number VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD address_two VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD address_three VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP nationality_id, DROP address2, DROP address3, CHANGE sector_id sector_id INT NOT NULL, CHANGE email first_name VARCHAR(300) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mobile_no mobile_number VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE phone_no roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE address1 address_one VARCHAR(500) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE business ADD CONSTRAINT FK_8D36E388BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE business ADD CONSTRAINT FK_8D36E38F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_8D36E388BAC62AF ON business (city_id)');
        $this->addSql('CREATE INDEX IDX_8D36E38F92F3E70 ON business (country_id)');
        $this->addSql('ALTER TABLE destination CHANGE city_id city_id INT NOT NULL, CHANGE sector_id sector_id INT NOT NULL, CHANGE country_id country_id INT NOT NULL');
        $this->addSql('ALTER TABLE traveller ADD top_destinations VARCHAR(1000) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD favourite_hangout VARCHAR(1000) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD favourite_cuisine VARCHAR(1000) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD dream_holiday VARCHAR(1000) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nationality_id nationality_id INT NOT NULL, CHANGE traveller_category_id traveller_category_id INT NOT NULL, CHANGE date_of_birth date_of_birth VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE gender gender VARCHAR(6) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email_address VARCHAR(300) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mobile_no mobile_number VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE phone_no roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}

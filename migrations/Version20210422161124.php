<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422161124 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE resultat (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE test CHANGE note note INT NOT NULL, CHANGE reponse1 reponse1 VARCHAR(255) NOT NULL, CHANGE reponse2 reponse2 VARCHAR(255) NOT NULL, CHANGE reponse3 reponse3 VARCHAR(255) NOT NULL, CHANGE reponse4 reponse4 VARCHAR(255) NOT NULL, CHANGE reponse5 reponse5 VARCHAR(255) NOT NULL, CHANGE reponse6 reponse6 VARCHAR(255) NOT NULL, CHANGE reponse7 reponse7 VARCHAR(255) NOT NULL, CHANGE reponse8 reponse8 VARCHAR(255) NOT NULL, CHANGE reponse9 reponse9 VARCHAR(255) NOT NULL, CHANGE reponse10 reponse10 VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE resultat');
        $this->addSql('ALTER TABLE test CHANGE note note INT DEFAULT NULL, CHANGE reponse1 reponse1 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reponse2 reponse2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reponse3 reponse3 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reponse4 reponse4 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reponse5 reponse5 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reponse6 reponse6 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reponse7 reponse7 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reponse8 reponse8 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reponse9 reponse9 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reponse10 reponse10 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}

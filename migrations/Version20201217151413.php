<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201217151413 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, numero_entreprise INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fichier (id INT AUTO_INCREMENT NOT NULL, photo_profil VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE independant (id INT AUTO_INCREMENT NOT NULL, numero_independant INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme_vocabulaire (theme_id INT NOT NULL, vocabulaire_id INT NOT NULL, INDEX IDX_3331CD7259027487 (theme_id), INDEX IDX_3331CD72D8B12F03 (vocabulaire_id), PRIMARY KEY(theme_id, vocabulaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_test (user_id INT NOT NULL, test_id INT NOT NULL, INDEX IDX_A2FE32C5A76ED395 (user_id), INDEX IDX_A2FE32C51E5D0459 (test_id), PRIMARY KEY(user_id, test_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE theme_vocabulaire ADD CONSTRAINT FK_3331CD7259027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE theme_vocabulaire ADD CONSTRAINT FK_3331CD72D8B12F03 FOREIGN KEY (vocabulaire_id) REFERENCES vocabulaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_test ADD CONSTRAINT FK_A2FE32C5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_test ADD CONSTRAINT FK_A2FE32C51E5D0459 FOREIGN KEY (test_id) REFERENCES test (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE test ADD theme_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0C59027487 FOREIGN KEY (theme_id) REFERENCES theme (id)');
        $this->addSql('CREATE INDEX IDX_D87F7E0C59027487 ON test (theme_id)');
        $this->addSql('ALTER TABLE user ADD fichier_id INT DEFAULT NULL, ADD abonnement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F915CFE FOREIGN KEY (fichier_id) REFERENCES fichier (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F1D74413 FOREIGN KEY (abonnement_id) REFERENCES abonnement (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F915CFE ON user (fichier_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649F1D74413 ON user (abonnement_id)');
        $this->addSql('ALTER TABLE vocabulaire ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vocabulaire ADD CONSTRAINT FK_DB1ADE7DBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_DB1ADE7DBCF5E72D ON vocabulaire (categorie_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F915CFE');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE fichier');
        $this->addSql('DROP TABLE independant');
        $this->addSql('DROP TABLE theme_vocabulaire');
        $this->addSql('DROP TABLE user_test');
        $this->addSql('ALTER TABLE test DROP FOREIGN KEY FK_D87F7E0C59027487');
        $this->addSql('DROP INDEX IDX_D87F7E0C59027487 ON test');
        $this->addSql('ALTER TABLE test DROP theme_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F1D74413');
        $this->addSql('DROP INDEX UNIQ_8D93D649F915CFE ON user');
        $this->addSql('DROP INDEX IDX_8D93D649F1D74413 ON user');
        $this->addSql('ALTER TABLE user DROP fichier_id, DROP abonnement_id');
        $this->addSql('ALTER TABLE vocabulaire DROP FOREIGN KEY FK_DB1ADE7DBCF5E72D');
        $this->addSql('DROP INDEX IDX_DB1ADE7DBCF5E72D ON vocabulaire');
        $this->addSql('ALTER TABLE vocabulaire DROP categorie_id');
    }
}

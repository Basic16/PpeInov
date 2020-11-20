<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201120161314 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE liste_vocabulaire (liste_id INT NOT NULL, vocabulaire_id INT NOT NULL, INDEX IDX_C2640291E85441D8 (liste_id), INDEX IDX_C2640291D8B12F03 (vocabulaire_id), PRIMARY KEY(liste_id, vocabulaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur_test (utilisateur_id INT NOT NULL, test_id INT NOT NULL, INDEX IDX_11FE1236FB88E14F (utilisateur_id), INDEX IDX_11FE12361E5D0459 (test_id), PRIMARY KEY(utilisateur_id, test_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE liste_vocabulaire ADD CONSTRAINT FK_C2640291E85441D8 FOREIGN KEY (liste_id) REFERENCES liste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE liste_vocabulaire ADD CONSTRAINT FK_C2640291D8B12F03 FOREIGN KEY (vocabulaire_id) REFERENCES vocabulaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_test ADD CONSTRAINT FK_11FE1236FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_test ADD CONSTRAINT FK_11FE12361E5D0459 FOREIGN KEY (test_id) REFERENCES test (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE abonnement ADD idutilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BBEAF07004 FOREIGN KEY (idutilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_351268BBEAF07004 ON abonnement (idutilisateur_id)');
        $this->addSql('ALTER TABLE test ADD idtheme_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0CF3D73C8A FOREIGN KEY (idtheme_id) REFERENCES theme (id)');
        $this->addSql('CREATE INDEX IDX_D87F7E0CF3D73C8A ON test (idtheme_id)');
        $this->addSql('ALTER TABLE vocabulaire ADD idcategorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE vocabulaire ADD CONSTRAINT FK_DB1ADE7DFA5A9824 FOREIGN KEY (idcategorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_DB1ADE7DFA5A9824 ON vocabulaire (idcategorie_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE liste_vocabulaire');
        $this->addSql('DROP TABLE utilisateur_test');
        $this->addSql('ALTER TABLE abonnement DROP FOREIGN KEY FK_351268BBEAF07004');
        $this->addSql('DROP INDEX IDX_351268BBEAF07004 ON abonnement');
        $this->addSql('ALTER TABLE abonnement DROP idutilisateur_id');
        $this->addSql('ALTER TABLE test DROP FOREIGN KEY FK_D87F7E0CF3D73C8A');
        $this->addSql('DROP INDEX IDX_D87F7E0CF3D73C8A ON test');
        $this->addSql('ALTER TABLE test DROP idtheme_id');
        $this->addSql('ALTER TABLE vocabulaire DROP FOREIGN KEY FK_DB1ADE7DFA5A9824');
        $this->addSql('DROP INDEX IDX_DB1ADE7DFA5A9824 ON vocabulaire');
        $this->addSql('ALTER TABLE vocabulaire DROP idcategorie_id');
    }
}

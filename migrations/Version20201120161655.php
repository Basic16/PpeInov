<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201120161655 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liste ADD idtheme_id INT NOT NULL');
        $this->addSql('ALTER TABLE liste ADD CONSTRAINT FK_FCF22AF4F3D73C8A FOREIGN KEY (idtheme_id) REFERENCES theme (id)');
        $this->addSql('CREATE INDEX IDX_FCF22AF4F3D73C8A ON liste (idtheme_id)');
        $this->addSql('ALTER TABLE test ADD idresultat_id INT NOT NULL');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0C14F299F3 FOREIGN KEY (idresultat_id) REFERENCES resultat (id)');
        $this->addSql('CREATE INDEX IDX_D87F7E0C14F299F3 ON test (idresultat_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liste DROP FOREIGN KEY FK_FCF22AF4F3D73C8A');
        $this->addSql('DROP INDEX IDX_FCF22AF4F3D73C8A ON liste');
        $this->addSql('ALTER TABLE liste DROP idtheme_id');
        $this->addSql('ALTER TABLE test DROP FOREIGN KEY FK_D87F7E0C14F299F3');
        $this->addSql('DROP INDEX IDX_D87F7E0C14F299F3 ON test');
        $this->addSql('ALTER TABLE test DROP idresultat_id');
    }
}

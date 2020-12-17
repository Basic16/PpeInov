<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201217133526 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE theme_vocabulaire (theme_id INT NOT NULL, vocabulaire_id INT NOT NULL, INDEX IDX_3331CD7259027487 (theme_id), INDEX IDX_3331CD72D8B12F03 (vocabulaire_id), PRIMARY KEY(theme_id, vocabulaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE theme_vocabulaire ADD CONSTRAINT FK_3331CD7259027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE theme_vocabulaire ADD CONSTRAINT FK_3331CD72D8B12F03 FOREIGN KEY (vocabulaire_id) REFERENCES vocabulaire (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE theme_vocabulaire');
    }
}

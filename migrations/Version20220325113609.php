<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220325113609 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE suite DROP FOREIGN KEY FK_153CE426825396CB');
        $this->addSql('DROP INDEX UNIQ_153CE426825396CB ON suite');
        $this->addSql('ALTER TABLE suite DROP galerie_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE suite ADD galerie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE suite ADD CONSTRAINT FK_153CE426825396CB FOREIGN KEY (galerie_id) REFERENCES gallerie (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_153CE426825396CB ON suite (galerie_id)');
    }
}

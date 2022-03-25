<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220325125019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gallerie ADD suite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gallerie ADD CONSTRAINT FK_63539AC14FFCB518 FOREIGN KEY (suite_id) REFERENCES suite (id)');
        $this->addSql('CREATE INDEX IDX_63539AC14FFCB518 ON gallerie (suite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gallerie DROP FOREIGN KEY FK_63539AC14FFCB518');
        $this->addSql('DROP INDEX IDX_63539AC14FFCB518 ON gallerie');
        $this->addSql('ALTER TABLE gallerie DROP suite_id');
    }
}

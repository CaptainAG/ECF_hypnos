<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220329130325 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE reservation_suite');
        $this->addSql('ALTER TABLE demande CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD suite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849554FFCB518 FOREIGN KEY (suite_id) REFERENCES suite (id)');
        $this->addSql('CREATE INDEX IDX_42C849554FFCB518 ON reservation (suite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation_suite (reservation_id INT NOT NULL, suite_id INT NOT NULL, INDEX IDX_56433481B83297E7 (reservation_id), INDEX IDX_564334814FFCB518 (suite_id), PRIMARY KEY(reservation_id, suite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE reservation_suite ADD CONSTRAINT FK_564334814FFCB518 FOREIGN KEY (suite_id) REFERENCES suite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_suite ADD CONSTRAINT FK_56433481B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE demande CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849554FFCB518');
        $this->addSql('DROP INDEX IDX_42C849554FFCB518 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP suite_id');
    }
}

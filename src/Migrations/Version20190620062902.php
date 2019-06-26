<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190620062902 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE duree ADD relation VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE jeu ADD duree_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE jeu ADD CONSTRAINT FK_82E48DB5D13C140 FOREIGN KEY (duree_id) REFERENCES duree (id)');
        $this->addSql('CREATE INDEX IDX_82E48DB5D13C140 ON jeu (duree_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE duree DROP relation');
        $this->addSql('ALTER TABLE jeu DROP FOREIGN KEY FK_82E48DB5D13C140');
        $this->addSql('DROP INDEX IDX_82E48DB5D13C140 ON jeu');
        $this->addSql('ALTER TABLE jeu DROP duree_id');
    }
}

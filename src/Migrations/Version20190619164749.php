<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190619164749 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE jeu (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, nom VARCHAR(255) NOT NULL, jaquette VARCHAR(255) DEFAULT NULL, critere VARCHAR(255) NOT NULL, resume LONGTEXT NOT NULL, agemin INT NOT NULL, agemax INT NOT NULL, prixconcours VARCHAR(255) DEFAULT NULL, regle LONGTEXT NOT NULL, ambiance VARCHAR(255) DEFAULT NULL, nbjoueurmin INT NOT NULL, nbjoueurmax INT NOT NULL, INDEX IDX_82E48DB5B3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau (id INT AUTO_INCREMENT NOT NULL, niveau VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jeu ADD CONSTRAINT FK_82E48DB5B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE jeu DROP FOREIGN KEY FK_82E48DB5B3E9C81');
        $this->addSql('DROP TABLE jeu');
        $this->addSql('DROP TABLE niveau');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190918075131 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE auteur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, relecteur TINYINT(1) NOT NULL DEFAULT 0, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('INSERT INTO auteur (nom) SELECT DISTINCT auteur FROM publication');
        $this->addSql('ALTER TABLE publication ADD ecrit_par_id INT NOT NULL');
        $this->addSql('UPDATE publication SET ecrit_par_id = (SELECT id FROM auteur WHERE auteur.nom = publication.auteur)');
        $this->addSql('ALTER TABLE publication DROP auteur');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C6779AAF6E29 FOREIGN KEY (ecrit_par_id) REFERENCES auteur (id)');
        $this->addSql('CREATE INDEX IDX_AF3C6779AAF6E29 ON publication (ecrit_par_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C6779AAF6E29');
        $this->addSql('ALTER TABLE publication ADD auteur VARCHAR(255) NOT NULL');
        $this->addSql('UPDATE publication SET auteur = (SELECT nom FROM auteur WHERE auteur.id = publication.ecrit_par_id)');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP INDEX IDX_AF3C6779AAF6E29 ON publication');
        $this->addSql('ALTER TABLE publication DROP ecrit_par_id');
    }
}

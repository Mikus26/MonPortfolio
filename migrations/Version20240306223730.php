<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240306223730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse_mail VARCHAR(255) NOT NULL, numero_tel VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, entreprise VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaires ADD commentaires_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C417C4B2B0 FOREIGN KEY (commentaires_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D9BEC0C417C4B2B0 ON commentaires (commentaires_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE contact');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C417C4B2B0');
        $this->addSql('DROP INDEX UNIQ_D9BEC0C417C4B2B0 ON commentaires');
        $this->addSql('ALTER TABLE commentaires DROP commentaires_id');
    }
}

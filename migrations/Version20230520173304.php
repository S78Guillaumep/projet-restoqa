<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230520173304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formule CHANGE prix prix VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE plat CHANGE prix prix VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B37EE5403C FOREIGN KEY (administrateur_id) REFERENCES administrateur (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B319EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B37EE5403C ON utilisateur (administrateur_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B319EB6921 ON utilisateur (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plat CHANGE prix prix DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE formule CHANGE prix prix DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B37EE5403C');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B319EB6921');
        $this->addSql('DROP INDEX UNIQ_1D1C63B37EE5403C ON utilisateur');
        $this->addSql('DROP INDEX UNIQ_1D1C63B319EB6921 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur CHANGE roles roles VARCHAR(255) NOT NULL');
    }
}

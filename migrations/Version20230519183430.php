<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230519183430 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('CREATE TABLE carte (id INT AUTO_INCREMENT NOT NULL, idplat_id INT DEFAULT NULL, idadminstrateur_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, INDEX IDX_BAD4FFFD839E70E (idplat_id), INDEX IDX_BAD4FFFD271BE848 (idadminstrateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, idformule_id INT DEFAULT NULL, idaministrateur_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, INDEX IDX_7D053A93E7C1E9EB (idformule_id), INDEX IDX_7D053A93412E9FEB (idaministrateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFD839E70E FOREIGN KEY (idplat_id) REFERENCES plat (id)');
        //$this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFD271BE848 FOREIGN KEY (idadminstrateur_id) REFERENCES administrateur (id)');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93E7C1E9EB FOREIGN KEY (idformule_id) REFERENCES formule (id)');
        //$this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93412E9FEB FOREIGN KEY (idaministrateur_id) REFERENCES administrateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFD839E70E');
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFD271BE848');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93E7C1E9EB');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93412E9FEB');
        $this->addSql('DROP TABLE carte');
        $this->addSql('DROP TABLE menu');
    }
}

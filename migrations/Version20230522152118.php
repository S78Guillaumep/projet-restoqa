<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230522152118 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carte CHANGE carteordre carteordre INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93E7C1E9EB');
        $this->addSql('DROP INDEX IDX_7D053A93E7C1E9EB ON menu');
        $this->addSql('ALTER TABLE menu CHANGE idformule_id formule_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A932A68F4D1 FOREIGN KEY (formule_id) REFERENCES formule (id)');
        $this->addSql('CREATE INDEX IDX_7D053A932A68F4D1 ON menu (formule_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carte CHANGE carteordre carteordre INT NOT NULL');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A932A68F4D1');
        $this->addSql('DROP INDEX IDX_7D053A932A68F4D1 ON menu');
        $this->addSql('ALTER TABLE menu CHANGE formule_id idformule_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93E7C1E9EB FOREIGN KEY (idformule_id) REFERENCES formule (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_7D053A93E7C1E9EB ON menu (idformule_id)');
    }
}

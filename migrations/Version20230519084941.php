<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230519084941 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('ALTER TABLE horaire ADD administrateur_id INT DEFAULT NULL');
        //$this->addSql('ALTER TABLE horaire ADD CONSTRAINT FK_BBC83DB67EE5403C FOREIGN KEY (administrateur_id) REFERENCES administrateur (id)');
        //$this->addSql('CREATE INDEX IDX_BBC83DB67EE5403C ON horaire (administrateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE horaire DROP FOREIGN KEY FK_BBC83DB67EE5403C');
        $this->addSql('DROP INDEX IDX_BBC83DB67EE5403C ON horaire');
        $this->addSql('ALTER TABLE horaire DROP administrateur_id');
    }
}

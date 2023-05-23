<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230522092955 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carte ADD parent_id INT DEFAULT NULL, ADD carteordre INT NOT NULL');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFD727ACA70 FOREIGN KEY (parent_id) REFERENCES carte (id)');
        $this->addSql('CREATE INDEX IDX_BAD4FFFD727ACA70 ON carte (parent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFD727ACA70');
        $this->addSql('DROP INDEX IDX_BAD4FFFD727ACA70 ON carte');
        $this->addSql('ALTER TABLE carte DROP parent_id, DROP carteordre');
    }
}

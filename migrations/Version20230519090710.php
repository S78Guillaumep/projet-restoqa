<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230519090710 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, date DATETIME NOT NULL, heure DATETIME NOT NULL, nbconvive DOUBLE PRECISION NOT NULL, allergie LONGTEXT DEFAULT NULL, INDEX IDX_42C8495519EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE date DROP FOREIGN KEY FK_AA9E377A67F0C0D4');
        $this->addSql('DROP TABLE date');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE date (id INT AUTO_INCREMENT NOT NULL, idclient_id INT DEFAULT NULL, datetime DATETIME NOT NULL, heure DATETIME NOT NULL, nbcouvert DOUBLE PRECISION NOT NULL, allergie VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_AA9E377A67F0C0D4 (idclient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE date ADD CONSTRAINT FK_AA9E377A67F0C0D4 FOREIGN KEY (idclient_id) REFERENCES client (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921');
        $this->addSql('DROP TABLE reservation');
    }
}

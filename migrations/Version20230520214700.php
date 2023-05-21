<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230520214700 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955B83297E7');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955EAF07004');
        $this->addSql('DROP INDEX IDX_42C84955EAF07004 ON reservation');
        $this->addSql('DROP INDEX IDX_42C84955B83297E7 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP idutilisateur_id, CHANGE reservation_id utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_42C84955FB88E14F ON reservation (utilisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955FB88E14F');
        $this->addSql('DROP INDEX IDX_42C84955FB88E14F ON reservation');
        $this->addSql('ALTER TABLE reservation ADD idutilisateur_id INT NOT NULL, CHANGE utilisateur_id reservation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955B83297E7 FOREIGN KEY (reservation_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955EAF07004 FOREIGN KEY (idutilisateur_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_42C84955EAF07004 ON reservation (idutilisateur_id)');
        $this->addSql('CREATE INDEX IDX_42C84955B83297E7 ON reservation (reservation_id)');
    }
}

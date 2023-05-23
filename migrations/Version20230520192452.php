<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230520192452 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFD271BE848');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B7841834AE6059');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93412E9FEB');
        $this->addSql('ALTER TABLE horaire DROP FOREIGN KEY FK_BBC83DB67EE5403C');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B37EE5403C');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B319EB6921');
        //$this->addSql('ALTER TABLE administrateur DROP FOREIGN KEY FK_32EB52E8EAF07004');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455C6EE5C49');
        //$this->addSql('DROP TABLE administrateur');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP INDEX IDX_BAD4FFFD271BE848 ON carte');
        //$this->addSql('ALTER TABLE carte CHANGE idadminstrateur_id idutilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFDEAF07004 FOREIGN KEY (idutilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_BAD4FFFDEAF07004 ON carte (idutilisateur_id)');
        $this->addSql('DROP INDEX IDX_BBC83DB67EE5403C ON horaire');
        //$this->addSql('ALTER TABLE horaire CHANGE administrateur_id idutilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE horaire ADD CONSTRAINT FK_BBC83DB6EAF07004 FOREIGN KEY (idutilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_BBC83DB6EAF07004 ON horaire (idutilisateur_id)');
        $this->addSql('DROP INDEX IDX_7D053A93412E9FEB ON menu');
        $this->addSql('ALTER TABLE menu CHANGE idaministrateur_id idutilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93EAF07004 FOREIGN KEY (idutilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_7D053A93EAF07004 ON menu (idutilisateur_id)');
        $this->addSql('DROP INDEX IDX_14B7841834AE6059 ON photo');
        //$this->addSql('ALTER TABLE photo CHANGE idadministrateur_id idutilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418EAF07004 FOREIGN KEY (idutilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_14B78418EAF07004 ON photo (idutilisateur_id)');
        $this->addSql('DROP INDEX IDX_42C8495519EB6921 ON reservation');
        $this->addSql('ALTER TABLE reservation CHANGE client_id idutilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955EAF07004 FOREIGN KEY (idutilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_42C84955EAF07004 ON reservation (idutilisateur_id)');
        $this->addSql('DROP INDEX UNIQ_1D1C63B37EE5403C ON utilisateur');
        $this->addSql('DROP INDEX UNIQ_1D1C63B319EB6921 ON utilisateur');
        //$this->addSql('ALTER TABLE utilisateur DROP administrateur_id, DROP client_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        //$this->addSql('CREATE TABLE administrateur (id INT AUTO_INCREMENT NOT NULL, idutilisateur_id INT DEFAULT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, role VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_32EB52E8EAF07004 (idutilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT DEFAULT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nbconvive DOUBLE PRECISION NOT NULL, allergie LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, nbenfant DOUBLE PRECISION DEFAULT NULL, role VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_C7440455C6EE5C49 (id_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        //$this->addSql('ALTER TABLE administrateur ADD CONSTRAINT FK_32EB52E8EAF07004 FOREIGN KEY (idutilisateur_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFDEAF07004');
        $this->addSql('DROP INDEX IDX_BAD4FFFDEAF07004 ON carte');
        //$this->addSql('ALTER TABLE carte CHANGE idutilisateur_id idadminstrateur_id INT DEFAULT NULL');
        //$this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFD271BE848 FOREIGN KEY (idadminstrateur_id) REFERENCES administrateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        //$this->addSql('CREATE INDEX IDX_BAD4FFFD271BE848 ON carte (idadminstrateur_id)');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418EAF07004');
        $this->addSql('DROP INDEX IDX_14B78418EAF07004 ON photo');
        //$this->addSql('ALTER TABLE photo CHANGE idutilisateur_id idadministrateur_id INT DEFAULT NULL');
        //$this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B7841834AE6059 FOREIGN KEY (idadministrateur_id) REFERENCES administrateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        //$this->addSql('CREATE INDEX IDX_14B7841834AE6059 ON photo (idadministrateur_id)');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93EAF07004');
        $this->addSql('DROP INDEX IDX_7D053A93EAF07004 ON menu');
        //$this->addSql('ALTER TABLE menu CHANGE idutilisateur_id idaministrateur_id INT DEFAULT NULL');
        //$this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93412E9FEB FOREIGN KEY (idaministrateur_id) REFERENCES administrateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        //$this->addSql('CREATE INDEX IDX_7D053A93412E9FEB ON menu (idaministrateur_id)');
        $this->addSql('ALTER TABLE horaire DROP FOREIGN KEY FK_BBC83DB6EAF07004');
        $this->addSql('DROP INDEX IDX_BBC83DB6EAF07004 ON horaire');
        //$this->addSql('ALTER TABLE horaire CHANGE idutilisateur_id administrateur_id INT DEFAULT NULL');
        //$this->addSql('ALTER TABLE horaire ADD CONSTRAINT FK_BBC83DB67EE5403C FOREIGN KEY (administrateur_id) REFERENCES administrateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        //$this->addSql('CREATE INDEX IDX_BBC83DB67EE5403C ON horaire (administrateur_id)');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955EAF07004');
        $this->addSql('DROP INDEX IDX_42C84955EAF07004 ON reservation');
        $this->addSql('ALTER TABLE reservation CHANGE idutilisateur_id client_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_42C8495519EB6921 ON reservation (client_id)');
        //$this->addSql('ALTER TABLE utilisateur ADD administrateur_id INT NOT NULL, ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B319EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        //$this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B37EE5403C FOREIGN KEY (administrateur_id) REFERENCES administrateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        //$this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B37EE5403C ON utilisateur (administrateur_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B319EB6921 ON utilisateur (client_id)');
    }
}

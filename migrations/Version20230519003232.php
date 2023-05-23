<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230519003232 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('CREATE TABLE administrateur (id INT AUTO_INCREMENT NOT NULL, idutilisateur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_32EB52E8EAF07004 (idutilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carte (id INT AUTO_INCREMENT NOT NULL, idplat_id INT DEFAULT NULL, idadminstrateur_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, INDEX IDX_BAD4FFFD839E70E (idplat_id), INDEX IDX_BAD4FFFD271BE848 (idadminstrateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, nbconvive DOUBLE PRECISION NOT NULL, allergie LONGTEXT DEFAULT NULL, nbenfant DOUBLE PRECISION DEFAULT NULL, UNIQUE INDEX UNIQ_C7440455C6EE5C49 (id_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE date (id INT AUTO_INCREMENT NOT NULL, idclient_id INT DEFAULT NULL, datetime DATETIME NOT NULL, heure DATETIME NOT NULL, nbcouvert DOUBLE PRECISION NOT NULL, allergie VARCHAR(255) NOT NULL, INDEX IDX_AA9E377A67F0C0D4 (idclient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formule (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prix DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE galerie (id INT AUTO_INCREMENT NOT NULL, idphoto_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_9E7D1590D44B0481 (idphoto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horaire (id INT AUTO_INCREMENT NOT NULL, jour DATETIME NOT NULL, ouverture DATETIME NOT NULL, fermeture DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, idformule_id INT DEFAULT NULL, idaministrateur_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, INDEX IDX_7D053A93E7C1E9EB (idformule_id), INDEX IDX_7D053A93412E9FEB (idaministrateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, idadministrateur_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, image LONGBLOB NOT NULL, INDEX IDX_14B7841834AE6059 (idadministrateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plat (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, titreplat VARCHAR(255) NOT NULL, INDEX IDX_2038A207727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B3E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('ALTER TABLE administrateur ADD CONSTRAINT FK_32EB52E8EAF07004 FOREIGN KEY (idutilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFD839E70E FOREIGN KEY (idplat_id) REFERENCES plat (id)');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFD271BE848 FOREIGN KEY (idadminstrateur_id) REFERENCES administrateur (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE date ADD CONSTRAINT FK_AA9E377A67F0C0D4 FOREIGN KEY (idclient_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE galerie ADD CONSTRAINT FK_9E7D1590D44B0481 FOREIGN KEY (idphoto_id) REFERENCES photo (id)');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93E7C1E9EB FOREIGN KEY (idformule_id) REFERENCES formule (id)');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93412E9FEB FOREIGN KEY (idaministrateur_id) REFERENCES administrateur (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B7841834AE6059 FOREIGN KEY (idadministrateur_id) REFERENCES administrateur (id)');
        $this->addSql('ALTER TABLE plat ADD CONSTRAINT FK_2038A207727ACA70 FOREIGN KEY (parent_id) REFERENCES plat (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        //$this->addSql('ALTER TABLE administrateur DROP FOREIGN KEY FK_32EB52E8EAF07004');
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFD839E70E');
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFD271BE848');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455C6EE5C49');
        $this->addSql('ALTER TABLE date DROP FOREIGN KEY FK_AA9E377A67F0C0D4');
        $this->addSql('ALTER TABLE galerie DROP FOREIGN KEY FK_9E7D1590D44B0481');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93E7C1E9EB');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93412E9FEB');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B7841834AE6059');
        $this->addSql('ALTER TABLE plat DROP FOREIGN KEY FK_2038A207727ACA70');
        $this->addSql('DROP TABLE administrateur');
        $this->addSql('DROP TABLE carte');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE date');
        $this->addSql('DROP TABLE formule');
        $this->addSql('DROP TABLE galerie');
        $this->addSql('DROP TABLE horaire');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE plat');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

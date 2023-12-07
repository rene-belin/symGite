<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231207140234 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, nom_departement VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recherche_gite (id INT AUTO_INCREMENT NOT NULL, region VARCHAR(255) NOT NULL, departement VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, equipement_interieur TINYINT(1) NOT NULL, equipement_exterieur TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, nom_region VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, nom_ville VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipement_exterieur DROP FOREIGN KEY FK_94299A20652CAE9B');
        $this->addSql('DROP INDEX IDX_94299A20652CAE9B ON equipement_exterieur');
        $this->addSql('ALTER TABLE equipement_exterieur ADD piscine_partagee TINYINT(1) NOT NULL, ADD tennis TINYINT(1) NOT NULL, ADD ping_pong TINYINT(1) NOT NULL, DROP gite_id');
        $this->addSql('ALTER TABLE equipement_interieur DROP FOREIGN KEY FK_C8C95198652CAE9B');
        $this->addSql('DROP INDEX IDX_C8C95198652CAE9B ON equipement_interieur');
        $this->addSql('ALTER TABLE equipement_interieur DROP gite_id');
        $this->addSql('ALTER TABLE gite DROP FOREIGN KEY FK_B638C92C76C50E4A');
        $this->addSql('ALTER TABLE gite DROP FOREIGN KEY FK_B638C92CC68BE09C');
        $this->addSql('DROP INDEX IDX_B638C92CC68BE09C ON gite');
        $this->addSql('DROP INDEX IDX_B638C92C76C50E4A ON gite');
        $this->addSql('ALTER TABLE gite ADD nombre_couchages INT NOT NULL, DROP proprietaire_id, DROP localisation_id, DROP nom_gite, CHANGE tarif_animaux tarif_animaux VARCHAR(100) NOT NULL, CHANGE tarif_location tarif_location VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE localisation DROP distance, CHANGE departement departement INT NOT NULL');
        $this->addSql('ALTER TABLE proprietaire ADD adresse VARCHAR(255) NOT NULL, ADD horaires_disponibles TIME NOT NULL COMMENT \'(DC2Type:time_immutable)\', DROP horaires_diponibilite, CHANGE nom nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2652CAE9B');
        $this->addSql('DROP INDEX IDX_E19D9AD2652CAE9B ON service');
        $this->addSql('ALTER TABLE service ADD nom_service VARCHAR(255) NOT NULL, DROP gite_id');
        $this->addSql('ALTER TABLE tarif_location DROP FOREIGN KEY FK_585B5DA6652CAE9B');
        $this->addSql('DROP INDEX IDX_585B5DA6652CAE9B ON tarif_location');
        $this->addSql('ALTER TABLE tarif_location ADD tarif VARCHAR(100) NOT NULL, DROP gite_id, DROP tarifs, CHANGE date_debut date_debut DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE date_fin date_fin DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP TABLE recherche_gite');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE ville');
        $this->addSql('ALTER TABLE equipement_exterieur ADD gite_id INT DEFAULT NULL, DROP piscine_partagee, DROP tennis, DROP ping_pong');
        $this->addSql('ALTER TABLE equipement_exterieur ADD CONSTRAINT FK_94299A20652CAE9B FOREIGN KEY (gite_id) REFERENCES gite (id)');
        $this->addSql('CREATE INDEX IDX_94299A20652CAE9B ON equipement_exterieur (gite_id)');
        $this->addSql('ALTER TABLE equipement_interieur ADD gite_id INT NOT NULL');
        $this->addSql('ALTER TABLE equipement_interieur ADD CONSTRAINT FK_C8C95198652CAE9B FOREIGN KEY (gite_id) REFERENCES gite (id)');
        $this->addSql('CREATE INDEX IDX_C8C95198652CAE9B ON equipement_interieur (gite_id)');
        $this->addSql('ALTER TABLE gite ADD localisation_id INT NOT NULL, ADD nom_gite VARCHAR(255) NOT NULL, CHANGE tarif_animaux tarif_animaux VARCHAR(255) NOT NULL, CHANGE tarif_location tarif_location VARCHAR(255) NOT NULL, CHANGE nombre_couchages proprietaire_id INT NOT NULL');
        $this->addSql('ALTER TABLE gite ADD CONSTRAINT FK_B638C92C76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id)');
        $this->addSql('ALTER TABLE gite ADD CONSTRAINT FK_B638C92CC68BE09C FOREIGN KEY (localisation_id) REFERENCES localisation (id)');
        $this->addSql('CREATE INDEX IDX_B638C92CC68BE09C ON gite (localisation_id)');
        $this->addSql('CREATE INDEX IDX_B638C92C76C50E4A ON gite (proprietaire_id)');
        $this->addSql('ALTER TABLE localisation ADD distance VARCHAR(255) NOT NULL, CHANGE departement departement VARCHAR(20) NOT NULL');
        $this->addSql('ALTER TABLE proprietaire ADD horaires_diponibilite VARCHAR(50) NOT NULL, DROP adresse, DROP horaires_disponibles, CHANGE nom nom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE service ADD gite_id INT DEFAULT NULL, DROP nom_service');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2652CAE9B FOREIGN KEY (gite_id) REFERENCES gite (id)');
        $this->addSql('CREATE INDEX IDX_E19D9AD2652CAE9B ON service (gite_id)');
        $this->addSql('ALTER TABLE tarif_location ADD gite_id INT NOT NULL, ADD tarifs VARCHAR(255) NOT NULL, DROP tarif, CHANGE date_debut date_debut DATETIME NOT NULL, CHANGE date_fin date_fin DATETIME NOT NULL');
        $this->addSql('ALTER TABLE tarif_location ADD CONSTRAINT FK_585B5DA6652CAE9B FOREIGN KEY (gite_id) REFERENCES gite (id)');
        $this->addSql('CREATE INDEX IDX_585B5DA6652CAE9B ON tarif_location (gite_id)');
    }
}

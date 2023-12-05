<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231205220127 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipement_exterieur (id INT AUTO_INCREMENT NOT NULL, terrasse TINYINT(1) NOT NULL, barbecue TINYINT(1) NOT NULL, piscine_privee TINYINT(1) NOT NULL, piscine_partagee TINYINT(1) NOT NULL, tennis TINYINT(1) NOT NULL, ping_pong TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement_interieur (id INT AUTO_INCREMENT NOT NULL, lave_vaiselle TINYINT(1) NOT NULL, lave_linge TINYINT(1) NOT NULL, climatisation TINYINT(1) NOT NULL, television TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gite (id INT AUTO_INCREMENT NOT NULL, surface_habitable VARCHAR(255) NOT NULL, nombre_chambres INT NOT NULL, nombre_couchages INT NOT NULL, accueil_animaux TINYINT(1) NOT NULL, tarif_animaux VARCHAR(100) NOT NULL, tarif_location VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE localisation (id INT AUTO_INCREMENT NOT NULL, region VARCHAR(255) NOT NULL, departement INT NOT NULL, ville VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprietaire (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal VARCHAR(10) DEFAULT NULL, telephone INT NOT NULL, email VARCHAR(255) NOT NULL, horaires_disponibles TIME NOT NULL COMMENT \'(DC2Type:time_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, location_linge TINYINT(1) NOT NULL, menage_fin_sejour TINYINT(1) NOT NULL, acces_internet TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarif_location (id INT AUTO_INCREMENT NOT NULL, date_debut DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', date_fin DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', tarif VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE equipement_exterieur');
        $this->addSql('DROP TABLE equipement_interieur');
        $this->addSql('DROP TABLE gite');
        $this->addSql('DROP TABLE localisation');
        $this->addSql('DROP TABLE proprietaire');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE tarif_location');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231019095410 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, titre_articl VARCHAR(255) NOT NULL, text_article LONGTEXT DEFAULT NULL, titre_image_article VARCHAR(255) DEFAULT NULL, lien_image_article VARCHAR(255) DEFAULT NULL, INDEX IDX_23A0E66FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bois (id INT AUTO_INCREMENT NOT NULL, titre_bois VARCHAR(255) NOT NULL, description_bois LONGTEXT DEFAULT NULL, prix_bois DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clef (id INT AUTO_INCREMENT NOT NULL, numero_de_serie VARCHAR(255) NOT NULL, metal VARCHAR(255) NOT NULL, forme VARCHAR(255) NOT NULL, bois VARCHAR(255) NOT NULL, es_produit TINYINT(1) NOT NULL, es_livre TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devis (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, bois_id INT NOT NULL, metal_id INT NOT NULL, forme_id INT NOT NULL, statut_id INT DEFAULT NULL, clef_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, type_serrure VARCHAR(255) NOT NULL, description_serrure LONGTEXT DEFAULT NULL, numeros_de_serie_serrure VARCHAR(255) DEFAULT NULL, es_accepter TINYINT(1) NOT NULL, prix_base DOUBLE PRECISION DEFAULT NULL, detaill_suplementaire LONGTEXT DEFAULT NULL, INDEX IDX_8B27C52BFB88E14F (utilisateur_id), INDEX IDX_8B27C52BC4F3951 (bois_id), INDEX IDX_8B27C52B2B534CF2 (metal_id), INDEX IDX_8B27C52BBCE84E7C (forme_id), INDEX IDX_8B27C52BF6203804 (statut_id), UNIQUE INDEX UNIQ_8B27C52B8E9B0AE7 (clef_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE forme (id INT AUTO_INCREMENT NOT NULL, titre_forme VARCHAR(255) NOT NULL, description_forme LONGTEXT DEFAULT NULL, prixforme DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image_clef (id INT AUTO_INCREMENT NOT NULL, clef_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, liens VARCHAR(255) DEFAULT NULL, INDEX IDX_77B04A48E9B0AE7 (clef_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE metal (id INT AUTO_INCREMENT NOT NULL, titre_metal VARCHAR(255) NOT NULL, description_metal LONGTEXT DEFAULT NULL, prix_metal DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B386CC499D (pseudo), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52BFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52BC4F3951 FOREIGN KEY (bois_id) REFERENCES bois (id)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B2B534CF2 FOREIGN KEY (metal_id) REFERENCES metal (id)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52BBCE84E7C FOREIGN KEY (forme_id) REFERENCES forme (id)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52BF6203804 FOREIGN KEY (statut_id) REFERENCES statut (id)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B8E9B0AE7 FOREIGN KEY (clef_id) REFERENCES clef (id)');
        $this->addSql('ALTER TABLE image_clef ADD CONSTRAINT FK_77B04A48E9B0AE7 FOREIGN KEY (clef_id) REFERENCES clef (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66FB88E14F');
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52BFB88E14F');
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52BC4F3951');
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52B2B534CF2');
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52BBCE84E7C');
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52BF6203804');
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52B8E9B0AE7');
        $this->addSql('ALTER TABLE image_clef DROP FOREIGN KEY FK_77B04A48E9B0AE7');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE bois');
        $this->addSql('DROP TABLE clef');
        $this->addSql('DROP TABLE devis');
        $this->addSql('DROP TABLE forme');
        $this->addSql('DROP TABLE image_clef');
        $this->addSql('DROP TABLE metal');
        $this->addSql('DROP TABLE statut');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220404125949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_CFF65260E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etablissement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(80) NOT NULL, description VARCHAR(250) NOT NULL, adresse VARCHAR(160) NOT NULL, ville VARCHAR(60) NOT NULL, code_postale INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gerant (id INT AUTO_INCREMENT NOT NULL, id_compte_id INT DEFAULT NULL, id_hotel_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_D1D45C7072F0DA07 (id_compte_id), UNIQUE INDEX UNIQ_D1D45C706298578D (id_hotel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, id_suite_id INT DEFAULT NULL, titre VARCHAR(80) NOT NULL, principal TINYINT(1) NOT NULL, lien VARCHAR(10000) NOT NULL, INDEX IDX_14B784181F27598D (id_suite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, id_suite_id INT DEFAULT NULL, titre VARCHAR(80) NOT NULL, prix_total INT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, status_reservation VARCHAR(255) NOT NULL, INDEX IDX_42C849551F27598D (id_suite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suite (id INT AUTO_INCREMENT NOT NULL, id_hotel_id INT DEFAULT NULL, nom VARCHAR(80) NOT NULL, prix INT NOT NULL, url_booking VARCHAR(100) NOT NULL, INDEX IDX_153CE4266298578D (id_hotel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gerant ADD CONSTRAINT FK_D1D45C7072F0DA07 FOREIGN KEY (id_compte_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE gerant ADD CONSTRAINT FK_D1D45C706298578D FOREIGN KEY (id_hotel_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784181F27598D FOREIGN KEY (id_suite_id) REFERENCES suite (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849551F27598D FOREIGN KEY (id_suite_id) REFERENCES suite (id)');
        $this->addSql('ALTER TABLE suite ADD CONSTRAINT FK_153CE4266298578D FOREIGN KEY (id_hotel_id) REFERENCES etablissement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gerant DROP FOREIGN KEY FK_D1D45C7072F0DA07');
        $this->addSql('ALTER TABLE gerant DROP FOREIGN KEY FK_D1D45C706298578D');
        $this->addSql('ALTER TABLE suite DROP FOREIGN KEY FK_153CE4266298578D');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784181F27598D');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849551F27598D');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE etablissement');
        $this->addSql('DROP TABLE gerant');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE suite');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

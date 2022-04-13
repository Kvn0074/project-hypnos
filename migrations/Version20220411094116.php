<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220411094116 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etablissement CHANGE description_intro description_intro VARCHAR(95) NOT NULL');
        $this->addSql('ALTER TABLE suite ADD slug VARCHAR(255) NOT NULL, ADD photo_principale VARCHAR(255) NOT NULL, ADD photo_deux VARCHAR(255) NOT NULL, ADD photo_3 VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etablissement CHANGE description_intro description_intro VARCHAR(95) DEFAULT NULL');
        $this->addSql('ALTER TABLE suite DROP slug, DROP photo_principale, DROP photo_deux, DROP photo_3');
    }
}

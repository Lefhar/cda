<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220204110504 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE disc ADD artists_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE disc ADD CONSTRAINT FK_2AF553054A05007 FOREIGN KEY (artists_id) REFERENCES artist (id)');
        $this->addSql('CREATE INDEX IDX_2AF553054A05007 ON disc (artists_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artist CHANGE artist_name artist_name VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE artist_url artist_url VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE disc DROP FOREIGN KEY FK_2AF553054A05007');
        $this->addSql('DROP INDEX IDX_2AF553054A05007 ON disc');
        $this->addSql('ALTER TABLE disc DROP artists_id, CHANGE disc_title disc_title VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE disc_picture disc_picture VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE disc_label disc_label VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE disc_genre disc_genre VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}

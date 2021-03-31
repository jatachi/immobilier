<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210325120305 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attachements ADD property_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE attachements ADD CONSTRAINT FK_212B82DC549213EC FOREIGN KEY (property_id) REFERENCES property (id)');
        $this->addSql('CREATE INDEX IDX_212B82DC549213EC ON attachements (property_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attachements DROP FOREIGN KEY FK_212B82DC549213EC');
        $this->addSql('DROP INDEX IDX_212B82DC549213EC ON attachements');
        $this->addSql('ALTER TABLE attachements DROP property_id');
    }
}

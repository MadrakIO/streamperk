<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160821212740 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE page');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE page (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci, slug VARCHAR(75) NOT NULL COLLATE utf8_unicode_ci, headline LONGTEXT COMMENT \'(DC2Type:encrypted_data)\' DEFAULT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:encrypted_data)\', content LONGTEXT COMMENT \'(DC2Type:encrypted_data)\' DEFAULT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:encrypted_data)\', last_updated DATETIME DEFAULT NULL, arrangement INT DEFAULT 0 NOT NULL, allow_anonymous TINYINT(1) DEFAULT \'0\' NOT NULL, UNIQUE INDEX UNIQ_140AB620989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }
}

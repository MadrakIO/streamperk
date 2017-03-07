<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160530223704 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE widget_page (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, slug VARCHAR(75) NOT NULL, allow_anonymous TINYINT(1) DEFAULT \'0\' NOT NULL, UNIQUE INDEX UNIQ_8CFDBD9F989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE widget_page_widget (id INT AUTO_INCREMENT NOT NULL, widget_page_id INT NOT NULL, type VARCHAR(50) NOT NULL, attributes LONGTEXT NOT NULL COMMENT \'(DC2Type:json_array)\', grid_row INT NOT NULL, grid_column INT NOT NULL, height INT NOT NULL, width INT NOT NULL, INDEX IDX_D43562422696425 (widget_page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE widget_page_widget ADD CONSTRAINT FK_D43562422696425 FOREIGN KEY (widget_page_id) REFERENCES widget_page (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE widget_page_widget DROP FOREIGN KEY FK_D43562422696425');
        $this->addSql('DROP TABLE widget_page');
        $this->addSql('DROP TABLE widget_page_widget');
    }
}

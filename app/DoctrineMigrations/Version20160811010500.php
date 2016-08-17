<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160811010500 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE widget_page_allowed_user_group (widget_page_id INT NOT NULL, user_group_id INT NOT NULL, INDEX IDX_4238E8892696425 (widget_page_id), INDEX IDX_4238E8891ED93D47 (user_group_id), PRIMARY KEY(widget_page_id, user_group_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE widget_page_allowed_user_group ADD CONSTRAINT FK_4238E8892696425 FOREIGN KEY (widget_page_id) REFERENCES widget_page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE widget_page_allowed_user_group ADD CONSTRAINT FK_4238E8891ED93D47 FOREIGN KEY (user_group_id) REFERENCES user_group (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE widget_page_allowed_user_group');
    }
}

<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160813211721 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE emote_allowed_user_group (emote_id INT NOT NULL, user_group_id INT NOT NULL, INDEX IDX_E420DEE37740BC00 (emote_id), INDEX IDX_E420DEE31ED93D47 (user_group_id), PRIMARY KEY(emote_id, user_group_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE emote_allowed_user_group ADD CONSTRAINT FK_E420DEE37740BC00 FOREIGN KEY (emote_id) REFERENCES emote (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE emote_allowed_user_group ADD CONSTRAINT FK_E420DEE31ED93D47 FOREIGN KEY (user_group_id) REFERENCES user_group (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE emote_allowed_user_group');
    }
}

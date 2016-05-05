<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160502225627 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE forum_thread_post_reader (forum_thread_post_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_2666DB7511D55D50 (forum_thread_post_id), INDEX IDX_2666DB75A76ED395 (user_id), PRIMARY KEY(forum_thread_post_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE forum_thread_post_reader ADD CONSTRAINT FK_2666DB7511D55D50 FOREIGN KEY (forum_thread_post_id) REFERENCES forum_thread_post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE forum_thread_post_reader ADD CONSTRAINT FK_2666DB75A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE forum_thread_post_reader');
    }
}

<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160429004202 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE forum_thread_post (id INT AUTO_INCREMENT NOT NULL, thread_id INT NOT NULL, creator_id INT NOT NULL, content LONGTEXT COMMENT \'(DC2Type:encrypted_data)\' NOT NULL COMMENT \'(DC2Type:encrypted_data)\', date_created DATETIME NOT NULL, INDEX IDX_D80FF3A1E2904019 (thread_id), INDEX IDX_D80FF3A161220EA6 (creator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE forum_thread (id INT AUTO_INCREMENT NOT NULL, forum_id INT NOT NULL, title VARCHAR(100) NOT NULL, slug VARCHAR(150) NOT NULL, stickied TINYINT(1) DEFAULT \'0\' NOT NULL, closed TINYINT(1) DEFAULT \'0\' NOT NULL, UNIQUE INDEX UNIQ_298F7F52989D9B62 (slug), INDEX IDX_298F7F5229CCBAD0 (forum_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE forum (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, slug VARCHAR(75) NOT NULL, description LONGTEXT DEFAULT NULL, arrangement INT DEFAULT 0 NOT NULL, UNIQUE INDEX UNIQ_852BBECD5E237E06 (name), UNIQUE INDEX UNIQ_852BBECD989D9B62 (slug), INDEX IDX_852BBECD727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE forum_thread_post ADD CONSTRAINT FK_D80FF3A1E2904019 FOREIGN KEY (thread_id) REFERENCES forum_thread (id)');
        $this->addSql('ALTER TABLE forum_thread_post ADD CONSTRAINT FK_D80FF3A161220EA6 FOREIGN KEY (creator_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE forum_thread ADD CONSTRAINT FK_298F7F5229CCBAD0 FOREIGN KEY (forum_id) REFERENCES forum (id)');
        $this->addSql('ALTER TABLE forum ADD CONSTRAINT FK_852BBECD727ACA70 FOREIGN KEY (parent_id) REFERENCES forum (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE forum_thread_post DROP FOREIGN KEY FK_D80FF3A1E2904019');
        $this->addSql('ALTER TABLE forum_thread DROP FOREIGN KEY FK_298F7F5229CCBAD0');
        $this->addSql('ALTER TABLE forum DROP FOREIGN KEY FK_852BBECD727ACA70');
        $this->addSql('DROP TABLE forum_thread_post');
        $this->addSql('DROP TABLE forum_thread');
        $this->addSql('DROP TABLE forum');
    }
}

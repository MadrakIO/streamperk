<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160817201849 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE file_download (id INT AUTO_INCREMENT NOT NULL, file_id INT NOT NULL, user_id INT NOT NULL, url LONGTEXT NOT NULL, downloaded_at DATETIME NOT NULL, expired_at DATETIME NOT NULL, INDEX IDX_C94A0DED93CB796C (file_id), INDEX IDX_C94A0DEDA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE file (id INT AUTO_INCREMENT NOT NULL, creator_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, type VARCHAR(100) NOT NULL, extension VARCHAR(10) NOT NULL, size INT NOT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8C9F36105E237E06 (name), INDEX IDX_8C9F361061220EA6 (creator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE file_allowed_user_group (file_id INT NOT NULL, user_group_id INT NOT NULL, INDEX IDX_6FD3F43193CB796C (file_id), INDEX IDX_6FD3F4311ED93D47 (user_group_id), PRIMARY KEY(file_id, user_group_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE file_download ADD CONSTRAINT FK_C94A0DED93CB796C FOREIGN KEY (file_id) REFERENCES file (id)');
        $this->addSql('ALTER TABLE file_download ADD CONSTRAINT FK_C94A0DEDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F361061220EA6 FOREIGN KEY (creator_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE file_allowed_user_group ADD CONSTRAINT FK_6FD3F43193CB796C FOREIGN KEY (file_id) REFERENCES file (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE file_allowed_user_group ADD CONSTRAINT FK_6FD3F4311ED93D47 FOREIGN KEY (user_group_id) REFERENCES user_group (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE file_download DROP FOREIGN KEY FK_C94A0DED93CB796C');
        $this->addSql('ALTER TABLE file_allowed_user_group DROP FOREIGN KEY FK_6FD3F43193CB796C');
        $this->addSql('DROP TABLE file_download');
        $this->addSql('DROP TABLE file');
        $this->addSql('DROP TABLE file_allowed_user_group');
    }
}

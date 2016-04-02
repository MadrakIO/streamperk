<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160211003843 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_group_user (user_group_id INT NOT NULL, user_id INT NOT NULL, expiration DATETIME DEFAULT NULL, INDEX IDX_3AE4BD51ED93D47 (user_group_id), INDEX IDX_3AE4BD5A76ED395 (user_id), PRIMARY KEY(user_group_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emote (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, url LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_6BBC85C65E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_group (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, slug VARCHAR(150) NOT NULL, managed TINYINT(1) DEFAULT \'0\' NOT NULL, permissions LONGTEXT NOT NULL COMMENT \'(DC2Type:json_array)\', UNIQUE INDEX UNIQ_8F02BF9D989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_setting (user_id INT NOT NULL, name VARCHAR(100) NOT NULL, value LONGTEXT COMMENT \'(DC2Type:encrypted_data)\' DEFAULT NULL COMMENT \'(DC2Type:encrypted_data)\', INDEX IDX_C779A692A76ED395 (user_id), PRIMARY KEY(user_id, name)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(50) NOT NULL, remote_id INT NOT NULL, username VARCHAR(255) NOT NULL, email LONGTEXT DEFAULT NULL, avatar LONGTEXT DEFAULT NULL, system_administrator TINYINT(1) DEFAULT \'0\' NOT NULL, banned TINYINT(1) DEFAULT \'0\' NOT NULL, UNIQUE INDEX type_and_remote_id (type, remote_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, slug VARCHAR(75) NOT NULL, headline LONGTEXT COMMENT \'(DC2Type:encrypted_data)\' DEFAULT NULL COMMENT \'(DC2Type:encrypted_data)\', content LONGTEXT COMMENT \'(DC2Type:encrypted_data)\' DEFAULT NULL COMMENT \'(DC2Type:encrypted_data)\', default_page TINYINT(1) DEFAULT \'0\' NOT NULL, last_updated DATETIME DEFAULT NULL, arrangement INT DEFAULT 0 NOT NULL, UNIQUE INDEX UNIQ_140AB620989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_group_user ADD CONSTRAINT FK_3AE4BD51ED93D47 FOREIGN KEY (user_group_id) REFERENCES user_group (id)');
        $this->addSql('ALTER TABLE user_group_user ADD CONSTRAINT FK_3AE4BD5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_setting ADD CONSTRAINT FK_C779A692A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_group_user DROP FOREIGN KEY FK_3AE4BD51ED93D47');
        $this->addSql('ALTER TABLE user_group_user DROP FOREIGN KEY FK_3AE4BD5A76ED395');
        $this->addSql('ALTER TABLE user_setting DROP FOREIGN KEY FK_C779A692A76ED395');
        $this->addSql('DROP TABLE user_group_user');
        $this->addSql('DROP TABLE emote');
        $this->addSql('DROP TABLE user_group');
        $this->addSql('DROP TABLE user_setting');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE page');
    }
}

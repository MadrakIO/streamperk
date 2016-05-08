<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160507141648 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE blog_post_comment (id INT AUTO_INCREMENT NOT NULL, blog_post_id INT NOT NULL, creator_id INT NOT NULL, content LONGTEXT COMMENT \'(DC2Type:encrypted_data)\' NOT NULL COMMENT \'(DC2Type:encrypted_data)\', date_created DATETIME NOT NULL, INDEX IDX_F3400AD8A77FBEAF (blog_post_id), INDEX IDX_F3400AD861220EA6 (creator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blog_post (id INT AUTO_INCREMENT NOT NULL, creator_id INT NOT NULL, title VARCHAR(150) NOT NULL, slug VARCHAR(200) NOT NULL, content LONGTEXT COMMENT \'(DC2Type:encrypted_data)\' NOT NULL COMMENT \'(DC2Type:encrypted_data)\', date_created DATETIME NOT NULL, date_published DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_BA5AE01D989D9B62 (slug), INDEX IDX_BA5AE01D61220EA6 (creator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blog_post_comment ADD CONSTRAINT FK_F3400AD8A77FBEAF FOREIGN KEY (blog_post_id) REFERENCES blog_post (id)');
        $this->addSql('ALTER TABLE blog_post_comment ADD CONSTRAINT FK_F3400AD861220EA6 FOREIGN KEY (creator_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE blog_post ADD CONSTRAINT FK_BA5AE01D61220EA6 FOREIGN KEY (creator_id) REFERENCES user (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE blog_post_comment DROP FOREIGN KEY FK_F3400AD8A77FBEAF');
        $this->addSql('DROP TABLE blog_post_comment');
        $this->addSql('DROP TABLE blog_post');
    }
}

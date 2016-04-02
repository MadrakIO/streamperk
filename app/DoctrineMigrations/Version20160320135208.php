<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160320135208 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE server_user (id INT AUTO_INCREMENT NOT NULL, server_id INT NOT NULL, user_id INT NOT NULL, approved TINYINT(1) DEFAULT \'0\' NOT NULL, banned TINYINT(1) DEFAULT \'0\' NOT NULL, INDEX IDX_613A7A91844E6B7 (server_id), INDEX IDX_613A7A9A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE server (id INT AUTO_INCREMENT NOT NULL, server_type VARCHAR(255) NOT NULL, name VARCHAR(100) NOT NULL, slug VARCHAR(150) NOT NULL, code VARCHAR(32) DEFAULT NULL, address LONGTEXT COMMENT \'(DC2Type:encrypted_data)\' NOT NULL COMMENT \'(DC2Type:encrypted_data)\', password LONGTEXT COMMENT \'(DC2Type:encrypted_data)\' DEFAULT NULL COMMENT \'(DC2Type:encrypted_data)\', description LONGTEXT COMMENT \'(DC2Type:encrypted_data)\' DEFAULT NULL COMMENT \'(DC2Type:encrypted_data)\', image LONGTEXT DEFAULT NULL, whitelisted TINYINT(1) NOT NULL, requires_approval TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_5A6DD5F65E237E06 (name), UNIQUE INDEX UNIQ_5A6DD5F6989D9B62 (slug), UNIQUE INDEX UNIQ_5A6DD5F677153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE server_question (id INT AUTO_INCREMENT NOT NULL, server_id INT NOT NULL, question LONGTEXT COMMENT \'(DC2Type:encrypted_data)\' NOT NULL COMMENT \'(DC2Type:encrypted_data)\', answer_type VARCHAR(50) NOT NULL, INDEX IDX_7452C8F21844E6B7 (server_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE server_question_answer (server_question_id INT NOT NULL, server_user_id INT NOT NULL, answer LONGTEXT COMMENT \'(DC2Type:encrypted_data)\' NOT NULL COMMENT \'(DC2Type:encrypted_data)\', INDEX IDX_8B3AB1EF56470F64 (server_question_id), INDEX IDX_8B3AB1EFD510C829 (server_user_id), PRIMARY KEY(server_question_id, server_user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE server_user ADD CONSTRAINT FK_613A7A91844E6B7 FOREIGN KEY (server_id) REFERENCES server (id)');
        $this->addSql('ALTER TABLE server_user ADD CONSTRAINT FK_613A7A9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE server_question ADD CONSTRAINT FK_7452C8F21844E6B7 FOREIGN KEY (server_id) REFERENCES server (id)');
        $this->addSql('ALTER TABLE server_question_answer ADD CONSTRAINT FK_8B3AB1EF56470F64 FOREIGN KEY (server_question_id) REFERENCES server_question (id)');
        $this->addSql('ALTER TABLE server_question_answer ADD CONSTRAINT FK_8B3AB1EFD510C829 FOREIGN KEY (server_user_id) REFERENCES server_user (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE server_question_answer DROP FOREIGN KEY FK_8B3AB1EFD510C829');
        $this->addSql('ALTER TABLE server_user DROP FOREIGN KEY FK_613A7A91844E6B7');
        $this->addSql('ALTER TABLE server_question DROP FOREIGN KEY FK_7452C8F21844E6B7');
        $this->addSql('ALTER TABLE server_question_answer DROP FOREIGN KEY FK_8B3AB1EF56470F64');
        $this->addSql('DROP TABLE server_user');
        $this->addSql('DROP TABLE server');
        $this->addSql('DROP TABLE server_question');
        $this->addSql('DROP TABLE server_question_answer');
    }
}

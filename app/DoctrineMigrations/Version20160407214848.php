<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160407214848 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE poll (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, slug VARCHAR(75) NOT NULL, question LONGTEXT COMMENT \'(DC2Type:encrypted_data)\' NOT NULL COMMENT \'(DC2Type:encrypted_data)\', max_number_of_answers INT DEFAULT 1 NOT NULL, anonymous TINYINT(1) DEFAULT \'0\' NOT NULL, UNIQUE INDEX UNIQ_84BCFA455E237E06 (name), UNIQUE INDEX UNIQ_84BCFA45989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poll_choice (id INT AUTO_INCREMENT NOT NULL, poll_id INT NOT NULL, answer LONGTEXT COMMENT \'(DC2Type:encrypted_data)\' NOT NULL COMMENT \'(DC2Type:encrypted_data)\', INDEX IDX_2DAE19C93C947C0F (poll_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE poll_choice ADD CONSTRAINT FK_2DAE19C93C947C0F FOREIGN KEY (poll_id) REFERENCES poll (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE poll_choice DROP FOREIGN KEY FK_2DAE19C93C947C0F');
        $this->addSql('DROP TABLE poll');
        $this->addSql('DROP TABLE poll_choice');
    }
}

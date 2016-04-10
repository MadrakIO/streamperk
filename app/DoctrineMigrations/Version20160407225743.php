<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160407225743 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE poll_participant (poll_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_E5FD1C133C947C0F (poll_id), INDEX IDX_E5FD1C13A76ED395 (user_id), PRIMARY KEY(poll_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poll_choice_voter (poll_choice_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_6A82A7CF52514F25 (poll_choice_id), INDEX IDX_6A82A7CFA76ED395 (user_id), PRIMARY KEY(poll_choice_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE poll_participant ADD CONSTRAINT FK_E5FD1C133C947C0F FOREIGN KEY (poll_id) REFERENCES poll (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE poll_participant ADD CONSTRAINT FK_E5FD1C13A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE poll_choice_voter ADD CONSTRAINT FK_6A82A7CF52514F25 FOREIGN KEY (poll_choice_id) REFERENCES poll_choice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE poll_choice_voter ADD CONSTRAINT FK_6A82A7CFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE poll_participant');
        $this->addSql('DROP TABLE poll_choice_voter');
    }
}

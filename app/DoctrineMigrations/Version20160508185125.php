<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160508185125 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE giveaway_participant_entry (id INT AUTO_INCREMENT NOT NULL, participant_id INT NOT NULL, entry_option_id INT NOT NULL, date_entered DATETIME NOT NULL, INDEX IDX_8CE820DA9D1C3019 (participant_id), INDEX IDX_8CE820DADFAD932D (entry_option_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE giveaway_entry_option (id INT AUTO_INCREMENT NOT NULL, giveaway_id INT NOT NULL, type VARCHAR(50) NOT NULL, INDEX IDX_23E9088B34ABDE8C (giveaway_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE giveaway (id INT AUTO_INCREMENT NOT NULL, creator_id INT NOT NULL, name VARCHAR(100) NOT NULL, slug VARCHAR(150) NOT NULL, image LONGTEXT COMMENT \'(DC2Type:encrypted_data)\' DEFAULT NULL COMMENT \'(DC2Type:encrypted_data)\', description LONGTEXT COMMENT \'(DC2Type:encrypted_data)\' DEFAULT NULL COMMENT \'(DC2Type:encrypted_data)\', date_started DATETIME NOT NULL, date_ended DATETIME DEFAULT NULL, number_of_winners INT DEFAULT 1 NOT NULL, status VARCHAR(50) DEFAULT \'open\' NOT NULL, UNIQUE INDEX UNIQ_AA9014D1989D9B62 (slug), INDEX IDX_AA9014D161220EA6 (creator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE giveaway_participant (id INT AUTO_INCREMENT NOT NULL, giveaway_id INT NOT NULL, user_id INT NOT NULL, winner TINYINT(1) DEFAULT \'0\' NOT NULL, INDEX IDX_E03597BE34ABDE8C (giveaway_id), INDEX IDX_E03597BEA76ED395 (user_id), UNIQUE INDEX giveaway_id_and_user_id (giveaway_id, user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE giveaway_participant_entry ADD CONSTRAINT FK_8CE820DA9D1C3019 FOREIGN KEY (participant_id) REFERENCES giveaway_participant (id)');
        $this->addSql('ALTER TABLE giveaway_participant_entry ADD CONSTRAINT FK_8CE820DADFAD932D FOREIGN KEY (entry_option_id) REFERENCES giveaway_entry_option (id)');
        $this->addSql('ALTER TABLE giveaway_entry_option ADD CONSTRAINT FK_23E9088B34ABDE8C FOREIGN KEY (giveaway_id) REFERENCES giveaway (id)');
        $this->addSql('ALTER TABLE giveaway ADD CONSTRAINT FK_AA9014D161220EA6 FOREIGN KEY (creator_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE giveaway_participant ADD CONSTRAINT FK_E03597BE34ABDE8C FOREIGN KEY (giveaway_id) REFERENCES giveaway (id)');
        $this->addSql('ALTER TABLE giveaway_participant ADD CONSTRAINT FK_E03597BEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE giveaway_participant_entry DROP FOREIGN KEY FK_8CE820DADFAD932D');
        $this->addSql('ALTER TABLE giveaway_entry_option DROP FOREIGN KEY FK_23E9088B34ABDE8C');
        $this->addSql('ALTER TABLE giveaway_participant DROP FOREIGN KEY FK_E03597BE34ABDE8C');
        $this->addSql('ALTER TABLE giveaway_participant_entry DROP FOREIGN KEY FK_8CE820DA9D1C3019');
        $this->addSql('DROP TABLE giveaway_participant_entry');
        $this->addSql('DROP TABLE giveaway_entry_option');
        $this->addSql('DROP TABLE giveaway');
        $this->addSql('DROP TABLE giveaway_participant');
    }
}

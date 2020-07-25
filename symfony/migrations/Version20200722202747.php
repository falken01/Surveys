<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722202747 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE respondent_answers (id INT AUTO_INCREMENT NOT NULL, answer_id INT NOT NULL, respondent_id INT NOT NULL, INDEX IDX_DB4E8877AA334807 (answer_id), INDEX IDX_DB4E8877CE80CD19 (respondent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE respondent_answers ADD CONSTRAINT FK_DB4E8877AA334807 FOREIGN KEY (answer_id) REFERENCES answer (id)');
        $this->addSql('ALTER TABLE respondent_answers ADD CONSTRAINT FK_DB4E8877CE80CD19 FOREIGN KEY (respondent_id) REFERENCES respondent (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE respondent_answers');
    }
}

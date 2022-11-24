<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221123154231 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE like_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE "user_like_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "user_like" (id INT NOT NULL, account_id INT DEFAULT NULL, id_drink VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D6E20C7A9B6B5FBA ON "user_like" (account_id)');
        $this->addSql('ALTER TABLE "user_like" ADD CONSTRAINT FK_D6E20C7A9B6B5FBA FOREIGN KEY (account_id) REFERENCES "account" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "like" DROP CONSTRAINT fk_ac6340b39b6b5fba');
        $this->addSql('DROP TABLE "like"');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE "user_like_id_seq" CASCADE');
        $this->addSql('CREATE SEQUENCE like_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "like" (id INT NOT NULL, account_id INT DEFAULT NULL, id_drink VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_ac6340b39b6b5fba ON "like" (account_id)');
        $this->addSql('ALTER TABLE "like" ADD CONSTRAINT fk_ac6340b39b6b5fba FOREIGN KEY (account_id) REFERENCES account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user_like" DROP CONSTRAINT FK_D6E20C7A9B6B5FBA');
        $this->addSql('DROP TABLE "user_like"');
    }
}

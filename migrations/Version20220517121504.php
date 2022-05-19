<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
<<<<<<<< HEAD:migrations/Version20220519192506.php
final class Version20220519192506 extends AbstractMigration
========
final class Version20220517121504 extends AbstractMigration
>>>>>>>> 52f8591b6d29a436dbd5b3eefca02d785e2cfa71:migrations/Version20220517121504.php
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
<<<<<<<< HEAD:migrations/Version20220519192506.php
        $this->addSql('ALTER TABLE pizza ADD category_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pizza ADD CONSTRAINT FK_CFDD826F9777D11E FOREIGN KEY (category_id_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_CFDD826F9777D11E ON pizza (category_id_id)');
========
        $this->addSql('ALTER TABLE size ADD name VARCHAR(255) NOT NULL');
>>>>>>>> 52f8591b6d29a436dbd5b3eefca02d785e2cfa71:migrations/Version20220517121504.php
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
<<<<<<<< HEAD:migrations/Version20220519192506.php
        $this->addSql('ALTER TABLE category CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE text text VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE pizza DROP FOREIGN KEY FK_CFDD826F9777D11E');
        $this->addSql('DROP INDEX IDX_CFDD826F9777D11E ON pizza');
        $this->addSql('ALTER TABLE pizza DROP category_id_id, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
========
        $this->addSql('ALTER TABLE category CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `order` CHANGE fname fname VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lname lname VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE address address VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE city city VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE zipcode zipcode VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE status status VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE products CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE size DROP name');
>>>>>>>> 52f8591b6d29a436dbd5b3eefca02d785e2cfa71:migrations/Version20220517121504.php
    }
}

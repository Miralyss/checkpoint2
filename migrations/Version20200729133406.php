<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200729133406 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE character_roles DROP FOREIGN KEY FK_48FDC9A538C751C4');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE character_roles');
        $this->addSql('DROP TABLE roles');
        $this->addSql('ALTER TABLE `character` ADD role_id INT NOT NULL, DROP description, DROP roles, CHANGE mana mana INT NOT NULL');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_937AB034D60322AC ON `character` (role_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034D60322AC');
        $this->addSql('CREATE TABLE character_roles (character_id INT NOT NULL, roles_id INT NOT NULL, INDEX IDX_48FDC9A51136BE75 (character_id), INDEX IDX_48FDC9A538C751C4 (roles_id), PRIMARY KEY(character_id, roles_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE roles (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE character_roles ADD CONSTRAINT FK_48FDC9A51136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_roles ADD CONSTRAINT FK_48FDC9A538C751C4 FOREIGN KEY (roles_id) REFERENCES roles (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP INDEX IDX_937AB034D60322AC ON `character`');
        $this->addSql('ALTER TABLE `character` ADD description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD roles VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP role_id, CHANGE mana mana INT DEFAULT NULL');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241206151318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recette_recette_ingredient (recette_id INTEGER NOT NULL, recette_ingredient_id INTEGER NOT NULL, PRIMARY KEY(recette_id, recette_ingredient_id), CONSTRAINT FK_F6E97C5E89312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_F6E97C5EC2EE1F3C FOREIGN KEY (recette_ingredient_id) REFERENCES recette_ingredient (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_F6E97C5E89312FE9 ON recette_recette_ingredient (recette_id)');
        $this->addSql('CREATE INDEX IDX_F6E97C5EC2EE1F3C ON recette_recette_ingredient (recette_ingredient_id)');
        $this->addSql('ALTER TABLE recette ADD COLUMN texte CLOB NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE recette_recette_ingredient');
        $this->addSql('CREATE TEMPORARY TABLE __temp__recette AS SELECT id, nom, text, duree_totale, nombre_de_personnes, photo, date FROM recette');
        $this->addSql('DROP TABLE recette');
        $this->addSql('CREATE TABLE recette (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, text VARCHAR(255) NOT NULL, duree_totale INTEGER NOT NULL, nombre_de_personnes INTEGER NOT NULL, photo VARCHAR(255) NOT NULL, date DATE NOT NULL)');
        $this->addSql('INSERT INTO recette (id, nom, text, duree_totale, nombre_de_personnes, photo, date) SELECT id, nom, text, duree_totale, nombre_de_personnes, photo, date FROM __temp__recette');
        $this->addSql('DROP TABLE __temp__recette');
    }
}

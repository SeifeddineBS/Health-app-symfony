<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210411213227 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY act1');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY art2');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY com1');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY con1');
        $this->addSql('ALTER TABLE entraide DROP FOREIGN KEY ent1');
        $this->addSql('ALTER TABLE ligne_classement DROP FOREIGN KEY idClient');
        $this->addSql('ALTER TABLE objectif DROP FOREIGN KEY fk_objCli');
        $this->addSql('ALTER TABLE participation_challenge DROP FOREIGN KEY participation_challenge_ibfk_2');
        $this->addSql('ALTER TABLE participationactivt DROP FOREIGN KEY part1');
        $this->addSql('ALTER TABLE participationtherapie DROP FOREIGN KEY part2');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY rep1');
        $this->addSql('ALTER TABLE suivi DROP FOREIGN KEY fk_SuivCli');
        $this->addSql('ALTER TABLE therapie DROP FOREIGN KEY th1');
        $this->addSql('CREATE TABLE classement (id INT AUTO_INCREMENT NOT NULL, idClient VARCHAR(255) NOT NULL, idNiveau INT NOT NULL, position INT NOT NULL, nbPoints INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE activite');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE entraide');
        $this->addSql('DROP TABLE ligne_challenge');
        $this->addSql('DROP TABLE ligne_classement');
        $this->addSql('DROP TABLE objectif');
        $this->addSql('DROP TABLE objectif_pred');
        $this->addSql('DROP TABLE participationactivt');
        $this->addSql('DROP TABLE participationtherapie');
        $this->addSql('DROP TABLE reminder');
        $this->addSql('DROP TABLE reponse');
        $this->addSql('DROP TABLE suivi');
        $this->addSql('DROP TABLE therapie');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE challenge DROP FOREIGN KEY challenge_ibfk_1');
        $this->addSql('DROP INDEX idNiveau ON challenge');
        $this->addSql('ALTER TABLE challenge CHANGE description description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE participation_challenge DROP FOREIGN KEY participation_challenge_ibfk_3');
        $this->addSql('DROP INDEX idClient ON participation_challenge');
        $this->addSql('DROP INDEX id_challenge ON participation_challenge');
        $this->addSql('DROP INDEX id_challenge_2 ON participation_challenge');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activite (id INT NOT NULL, idcoach VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, duree VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, date DATE NOT NULL, nombremax INT NOT NULL, type VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, description VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, lieu VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, INDEX act1 (idcoach), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE article (id INT NOT NULL, id_user VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, titre VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, theme VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, nom_auteur VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, date DATE NOT NULL, article VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, INDEX art2 (id_user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE commentaire (id INT NOT NULL, id_user VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, id_article INT NOT NULL, commentaire LONGTEXT CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, date DATE NOT NULL, INDEX com1 (id_user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE contact (id INT NOT NULL, id_user VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, type VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, champ TEXT CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, date DATE NOT NULL, INDEX con1 (id_user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE entraide (id INT NOT NULL, id_user VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, question TEXT CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, categorie VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, date DATE NOT NULL, visibilite INT NOT NULL, INDEX ent1 (id_user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ligne_challenge (id INT AUTO_INCREMENT NOT NULL, id_challenge INT NOT NULL, etat VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, INDEX id_challenge (id_challenge), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ligne_classement (id INT AUTO_INCREMENT NOT NULL, idClient VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, idNiveau INT NOT NULL, position INT NOT NULL, nbPoints INT NOT NULL, INDEX idClient (idClient), UNIQUE INDEX idClient_2 (idClient, idNiveau), INDEX idNiveau (idNiveau), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE objectif (id VARCHAR(50) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, description VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, reponse INT NOT NULL, dateDebut DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, duree INT NOT NULL, idClient VARCHAR(50) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, INDEX fk_objCli (idClient), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE objectif_pred (id VARCHAR(50) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, description VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, reponse INT NOT NULL, duree INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE participationactivt (id INT NOT NULL, idClient VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, id_activite INT NOT NULL, INDEX part1 (idClient), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE participationtherapie (id INT NOT NULL, idClient VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, id_therapie INT NOT NULL, INDEX part2 (idClient), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reminder (name VARCHAR(50) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, date DATE NOT NULL, id_participation INT NOT NULL, notes VARCHAR(500) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, time TIME NOT NULL, priority TINYINT(1) NOT NULL, completed TINYINT(1) NOT NULL, INDEX id_participation (id_participation), PRIMARY KEY(name, date)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reponse (id INT NOT NULL, id_user VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, id_question INT NOT NULL, date DATE NOT NULL, reponse TEXT CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, INDEX rep1 (id_user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE suivi (id VARCHAR(11) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, valeur INT NOT NULL, idClient VARCHAR(50) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, idObjectif VARCHAR(50) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX fk_SuivCli (idClient), INDEX fk_SuivObj (idObjectif), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE therapie (id INT NOT NULL, idcoach VARCHAR(254) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, sujet VARCHAR(254) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, date DATE NOT NULL, lieu VARCHAR(254) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, nombremax INT NOT NULL, INDEX th1 (idcoach), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, nom VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, prenom VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, email VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, password VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, tel VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, specialite VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, adresse VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, role VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT act1 FOREIGN KEY (idcoach) REFERENCES user (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT art2 FOREIGN KEY (id_user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT com1 FOREIGN KEY (id_user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT con1 FOREIGN KEY (id_user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE entraide ADD CONSTRAINT ent1 FOREIGN KEY (id_user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ligne_classement ADD CONSTRAINT idClient FOREIGN KEY (idClient) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ligne_classement ADD CONSTRAINT ligne_classement_ibfk_1 FOREIGN KEY (idNiveau) REFERENCES niveau (id)');
        $this->addSql('ALTER TABLE objectif ADD CONSTRAINT fk_objCli FOREIGN KEY (idClient) REFERENCES user (id)');
        $this->addSql('ALTER TABLE participationactivt ADD CONSTRAINT part1 FOREIGN KEY (idClient) REFERENCES user (id)');
        $this->addSql('ALTER TABLE participationtherapie ADD CONSTRAINT part2 FOREIGN KEY (idClient) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reminder ADD CONSTRAINT reminder_ibfk_1 FOREIGN KEY (id_participation) REFERENCES participation_challenge (id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT rep1 FOREIGN KEY (id_user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE suivi ADD CONSTRAINT fk_SuivCli FOREIGN KEY (idClient) REFERENCES user (id)');
        $this->addSql('ALTER TABLE therapie ADD CONSTRAINT th1 FOREIGN KEY (idcoach) REFERENCES user (id)');
        $this->addSql('DROP TABLE classement');
        $this->addSql('ALTER TABLE `challenge` CHANGE description description TEXT CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE `challenge` ADD CONSTRAINT challenge_ibfk_1 FOREIGN KEY (idNiveau) REFERENCES niveau (id)');
        $this->addSql('CREATE INDEX idNiveau ON `challenge` (idNiveau)');
        $this->addSql('ALTER TABLE participation_challenge ADD CONSTRAINT participation_challenge_ibfk_2 FOREIGN KEY (idClient) REFERENCES user (id)');
        $this->addSql('ALTER TABLE participation_challenge ADD CONSTRAINT participation_challenge_ibfk_3 FOREIGN KEY (id_challenge) REFERENCES challenge (id)');
        $this->addSql('CREATE INDEX idClient ON participation_challenge (idClient)');
        $this->addSql('CREATE INDEX id_challenge ON participation_challenge (id_challenge)');
        $this->addSql('CREATE UNIQUE INDEX id_challenge_2 ON participation_challenge (id_challenge, idClient)');
    }
}

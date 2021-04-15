<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210414143900 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE idcoach idcoach VARCHAR(255) DEFAULT NULL, CHANGE nombre_parti nombre_parti INT NOT NULL');
        $this->addSql('ALTER TABLE article CHANGE approuver approuver INT NOT NULL');
        $this->addSql('ALTER TABLE challenge CHANGE id_niveau id_niveau INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entraide CHANGE id_user id_user VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ligne_classement CHANGE id_client id_client VARCHAR(255) DEFAULT NULL, CHANGE id_niveau id_niveau INT DEFAULT NULL');
        $this->addSql('ALTER TABLE objectif CHANGE dateDebut dateDebut VARCHAR(50) NOT NULL, CHANGE idClient idClient VARCHAR(255) DEFAULT NULL, CHANGE mailchecked mailchecked INT NOT NULL, CHANGE icone icone VARCHAR(50) NOT NULL, CHANGE image image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE objectif_pred CHANGE idAdmin idAdmin VARCHAR(255) DEFAULT NULL, CHANGE icone icone VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE participation_challenge CHANGE id_challenge id_challenge INT DEFAULT NULL, CHANGE id_client id_client VARCHAR(255) DEFAULT NULL, CHANGE nb_points nb_points INT NOT NULL');
        $this->addSql('ALTER TABLE propoact CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE proptherapie CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE reponse CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE id_user id_user VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE suivi CHANGE idClient idClient VARCHAR(255) DEFAULT NULL, CHANGE idObjectif idObjectif INT DEFAULT NULL');
        $this->addSql('ALTER TABLE therapie CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE nombre_parti nombre_parti INT NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE id id VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite CHANGE id id INT NOT NULL, CHANGE idcoach idcoach VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE nombre_parti nombre_parti INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE article CHANGE approuver approuver INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE challenge CHANGE id_niveau id_niveau INT NOT NULL');
        $this->addSql('ALTER TABLE entraide CHANGE id_user id_user VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE ligne_classement CHANGE id_client id_client VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE id_niveau id_niveau INT NOT NULL');
        $this->addSql('ALTER TABLE objectif CHANGE dateDebut dateDebut DATE NOT NULL, CHANGE mailchecked mailchecked INT DEFAULT NULL, CHANGE icone icone VARCHAR(50) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, CHANGE image image VARCHAR(60) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, CHANGE idClient idClient VARCHAR(50) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE objectif_pred CHANGE icone icone VARCHAR(50) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, CHANGE idAdmin idAdmin VARCHAR(50) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE participation_challenge CHANGE id_challenge id_challenge INT NOT NULL, CHANGE id_client id_client VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE nb_points nb_points INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE propoact CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE proptherapie CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE reponse CHANGE id id INT NOT NULL, CHANGE id_user id_user VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE suivi CHANGE idClient idClient VARCHAR(50) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE idObjectif idObjectif INT NOT NULL');
        $this->addSql('ALTER TABLE therapie CHANGE id id INT NOT NULL, CHANGE nombre_parti nombre_parti INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE id id VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
    }
}

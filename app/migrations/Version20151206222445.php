<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151206222445 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ext_translations (id INT AUTO_INCREMENT NOT NULL, locale VARCHAR(8) NOT NULL, object_class VARCHAR(255) NOT NULL, field VARCHAR(32) NOT NULL, foreign_key VARCHAR(64) NOT NULL, content LONGTEXT DEFAULT NULL, INDEX translations_lookup_idx (locale, object_class, foreign_key), UNIQUE INDEX lookup_unique_idx (locale, object_class, field, foreign_key), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ext_log_entries (id INT AUTO_INCREMENT NOT NULL, action VARCHAR(8) NOT NULL, logged_at DATETIME NOT NULL, object_id VARCHAR(64) DEFAULT NULL, object_class VARCHAR(255) NOT NULL, version INT NOT NULL, data LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', username VARCHAR(255) DEFAULT NULL, INDEX log_class_lookup_idx (object_class), INDEX log_date_lookup_idx (logged_at), INDEX log_user_lookup_idx (username), INDEX log_version_lookup_idx (object_id, object_class, version), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_address (id INT AUTO_INCREMENT NOT NULL, city VARCHAR(50) NOT NULL, province ENUM(\'dolnoslaskie\', \'wielkopolskie\') NOT NULL COMMENT \'(DC2Type:province_type)\', street VARCHAR(60) NOT NULL, post_code_number VARCHAR(6) NOT NULL, post_code_city VARCHAR(60) NOT NULL, number SMALLINT NOT NULL, flat VARCHAR(6) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, leagues_id INT DEFAULT NULL, role VARCHAR(30) NOT NULL, pesel VARCHAR(12) DEFAULT NULL, gender ENUM(\'man\', \'woman\') NOT NULL COMMENT \'(DC2Type:gender_type)\', first_name VARCHAR(40) DEFAULT NULL, last_name VARCHAR(40) DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, discr VARCHAR(255) NOT NULL, INDEX IDX_957A64798642ED32 (leagues_id), INDEX role_idx (role), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fos_user_attribute (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, value LONGTEXT NOT NULL, INDEX IDX_3C55E4DFA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_activist (id INT AUTO_INCREMENT NOT NULL, pesel VARCHAR(12) DEFAULT NULL, gender ENUM(\'man\', \'woman\') NOT NULL COMMENT \'(DC2Type:gender_type)\', first_name VARCHAR(40) DEFAULT NULL, last_name VARCHAR(40) DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_league (id INT AUTO_INCREMENT NOT NULL, sup_league_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_9EBE3324BC38FF6A (sup_league_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_league_sub_leagues (league_id INT NOT NULL, sub_league_id INT NOT NULL, INDEX IDX_11EEE22858AFC4DE (league_id), UNIQUE INDEX UNIQ_11EEE2284AA28260 (sub_league_id), PRIMARY KEY(league_id, sub_league_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_league_condition (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_player (id INT AUTO_INCREMENT NOT NULL, team_id INT DEFAULT NULL, pesel VARCHAR(11) DEFAULT NULL, gender ENUM(\'man\', \'woman\') NOT NULL COMMENT \'(DC2Type:gender_type)\', first_name VARCHAR(40) DEFAULT NULL, last_name VARCHAR(40) DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, INDEX IDX_38138A59296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_punishment (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, created_at DATETIME NOT NULL, type ENUM(\'match\', \'season\') NOT NULL COMMENT \'(DC2Type:punishment_type)\', number SMALLINT DEFAULT NULL, comment VARCHAR(255) DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_580A399AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_stadium (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, description VARCHAR(255) DEFAULT NULL, founded_at DATETIME DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, latitude DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_team (id INT AUTO_INCREMENT NOT NULL, league_id INT DEFAULT NULL, trainer_id INT DEFAULT NULL, stadium_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, city VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, founded_at DATETIME DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, latitude DOUBLE PRECISION DEFAULT NULL, INDEX IDX_D6A4461F58AFC4DE (league_id), UNIQUE INDEX UNIQ_D6A4461FFB08EDF6 (trainer_id), INDEX IDX_D6A4461F7E860E36 (stadium_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_team_attribute (id INT AUTO_INCREMENT NOT NULL, team_id INT NOT NULL, name VARCHAR(255) NOT NULL, value LONGTEXT NOT NULL, INDEX IDX_2ADF3107296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_trainer (id INT AUTO_INCREMENT NOT NULL, team_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_EADA7E57296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_match (id INT AUTO_INCREMENT NOT NULL, home_id INT NOT NULL, away_id INT NOT NULL, home_goals SMALLINT NOT NULL, away_goals SMALLINT NOT NULL, vo TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_7A4981E528CDC89C (home_id), UNIQUE INDEX UNIQ_7A4981E58DEF089F (away_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_match_event (id INT AUTO_INCREMENT NOT NULL, match_id INT DEFAULT NULL, user_id INT NOT NULL, second_user_id INT DEFAULT NULL, type ENUM(\'goal\', \'yellow_card\', \'red_card\', \'penalty\', \'break_match\', \'start_match\', \'end_match\', \'start_half\') NOT NULL COMMENT \'(DC2Type:match_event_type)\', minute SMALLINT DEFAULT NULL, comment VARCHAR(255) DEFAULT NULL, INDEX IDX_C4E30F192ABEACD6 (match_id), UNIQUE INDEX UNIQ_C4E30F19A76ED395 (user_id), UNIQUE INDEX UNIQ_C4E30F19B02C53F8 (second_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_player_performance (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_round (id INT AUTO_INCREMENT NOT NULL, league_id INT DEFAULT NULL, season_id INT DEFAULT NULL, number SMALLINT NOT NULL, start DATETIME NOT NULL, end DATETIME NOT NULL, INDEX IDX_C5FCAED458AFC4DE (league_id), INDEX IDX_C5FCAED44EC001D1 (season_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_season (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, active_season TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_league_seasons (season_id INT NOT NULL, league_id INT NOT NULL, INDEX IDX_6AFDE9764EC001D1 (season_id), UNIQUE INDEX UNIQ_6AFDE97658AFC4DE (league_id), PRIMARY KEY(season_id, league_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fos_user ADD CONSTRAINT FK_957A64798642ED32 FOREIGN KEY (leagues_id) REFERENCES le_league (id)');
        $this->addSql('ALTER TABLE fos_user_attribute ADD CONSTRAINT FK_3C55E4DFA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE le_league ADD CONSTRAINT FK_9EBE3324BC38FF6A FOREIGN KEY (sup_league_id) REFERENCES le_league (id)');
        $this->addSql('ALTER TABLE le_league_sub_leagues ADD CONSTRAINT FK_11EEE22858AFC4DE FOREIGN KEY (league_id) REFERENCES le_league (id)');
        $this->addSql('ALTER TABLE le_league_sub_leagues ADD CONSTRAINT FK_11EEE2284AA28260 FOREIGN KEY (sub_league_id) REFERENCES le_league (id)');
        $this->addSql('ALTER TABLE le_player ADD CONSTRAINT FK_38138A59296CD8AE FOREIGN KEY (team_id) REFERENCES le_team (id)');
        $this->addSql('ALTER TABLE le_punishment ADD CONSTRAINT FK_580A399AA76ED395 FOREIGN KEY (user_id) REFERENCES le_player (id)');
        $this->addSql('ALTER TABLE le_team ADD CONSTRAINT FK_D6A4461F58AFC4DE FOREIGN KEY (league_id) REFERENCES le_league (id)');
        $this->addSql('ALTER TABLE le_team ADD CONSTRAINT FK_D6A4461FFB08EDF6 FOREIGN KEY (trainer_id) REFERENCES le_trainer (id)');
        $this->addSql('ALTER TABLE le_team ADD CONSTRAINT FK_D6A4461F7E860E36 FOREIGN KEY (stadium_id) REFERENCES le_stadium (id)');
        $this->addSql('ALTER TABLE le_team_attribute ADD CONSTRAINT FK_2ADF3107296CD8AE FOREIGN KEY (team_id) REFERENCES le_team (id)');
        $this->addSql('ALTER TABLE le_trainer ADD CONSTRAINT FK_EADA7E57296CD8AE FOREIGN KEY (team_id) REFERENCES le_team (id)');
        $this->addSql('ALTER TABLE le_match ADD CONSTRAINT FK_7A4981E528CDC89C FOREIGN KEY (home_id) REFERENCES le_team (id)');
        $this->addSql('ALTER TABLE le_match ADD CONSTRAINT FK_7A4981E58DEF089F FOREIGN KEY (away_id) REFERENCES le_team (id)');
        $this->addSql('ALTER TABLE le_match_event ADD CONSTRAINT FK_C4E30F192ABEACD6 FOREIGN KEY (match_id) REFERENCES le_match (id)');
        $this->addSql('ALTER TABLE le_match_event ADD CONSTRAINT FK_C4E30F19A76ED395 FOREIGN KEY (user_id) REFERENCES le_player (id)');
        $this->addSql('ALTER TABLE le_match_event ADD CONSTRAINT FK_C4E30F19B02C53F8 FOREIGN KEY (second_user_id) REFERENCES le_player (id)');
        $this->addSql('ALTER TABLE le_round ADD CONSTRAINT FK_C5FCAED458AFC4DE FOREIGN KEY (league_id) REFERENCES le_league (id)');
        $this->addSql('ALTER TABLE le_round ADD CONSTRAINT FK_C5FCAED44EC001D1 FOREIGN KEY (season_id) REFERENCES le_season (id)');
        $this->addSql('ALTER TABLE le_league_seasons ADD CONSTRAINT FK_6AFDE9764EC001D1 FOREIGN KEY (season_id) REFERENCES le_season (id)');
        $this->addSql('ALTER TABLE le_league_seasons ADD CONSTRAINT FK_6AFDE97658AFC4DE FOREIGN KEY (league_id) REFERENCES le_league (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fos_user_attribute DROP FOREIGN KEY FK_3C55E4DFA76ED395');
        $this->addSql('ALTER TABLE fos_user DROP FOREIGN KEY FK_957A64798642ED32');
        $this->addSql('ALTER TABLE le_league DROP FOREIGN KEY FK_9EBE3324BC38FF6A');
        $this->addSql('ALTER TABLE le_league_sub_leagues DROP FOREIGN KEY FK_11EEE22858AFC4DE');
        $this->addSql('ALTER TABLE le_league_sub_leagues DROP FOREIGN KEY FK_11EEE2284AA28260');
        $this->addSql('ALTER TABLE le_team DROP FOREIGN KEY FK_D6A4461F58AFC4DE');
        $this->addSql('ALTER TABLE le_round DROP FOREIGN KEY FK_C5FCAED458AFC4DE');
        $this->addSql('ALTER TABLE le_league_seasons DROP FOREIGN KEY FK_6AFDE97658AFC4DE');
        $this->addSql('ALTER TABLE le_punishment DROP FOREIGN KEY FK_580A399AA76ED395');
        $this->addSql('ALTER TABLE le_match_event DROP FOREIGN KEY FK_C4E30F19A76ED395');
        $this->addSql('ALTER TABLE le_match_event DROP FOREIGN KEY FK_C4E30F19B02C53F8');
        $this->addSql('ALTER TABLE le_team DROP FOREIGN KEY FK_D6A4461F7E860E36');
        $this->addSql('ALTER TABLE le_player DROP FOREIGN KEY FK_38138A59296CD8AE');
        $this->addSql('ALTER TABLE le_team_attribute DROP FOREIGN KEY FK_2ADF3107296CD8AE');
        $this->addSql('ALTER TABLE le_trainer DROP FOREIGN KEY FK_EADA7E57296CD8AE');
        $this->addSql('ALTER TABLE le_match DROP FOREIGN KEY FK_7A4981E528CDC89C');
        $this->addSql('ALTER TABLE le_match DROP FOREIGN KEY FK_7A4981E58DEF089F');
        $this->addSql('ALTER TABLE le_team DROP FOREIGN KEY FK_D6A4461FFB08EDF6');
        $this->addSql('ALTER TABLE le_match_event DROP FOREIGN KEY FK_C4E30F192ABEACD6');
        $this->addSql('ALTER TABLE le_round DROP FOREIGN KEY FK_C5FCAED44EC001D1');
        $this->addSql('ALTER TABLE le_league_seasons DROP FOREIGN KEY FK_6AFDE9764EC001D1');
        $this->addSql('DROP TABLE ext_translations');
        $this->addSql('DROP TABLE ext_log_entries');
        $this->addSql('DROP TABLE le_address');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('DROP TABLE fos_user_attribute');
        $this->addSql('DROP TABLE le_activist');
        $this->addSql('DROP TABLE le_league');
        $this->addSql('DROP TABLE le_league_sub_leagues');
        $this->addSql('DROP TABLE le_league_condition');
        $this->addSql('DROP TABLE le_player');
        $this->addSql('DROP TABLE le_punishment');
        $this->addSql('DROP TABLE le_stadium');
        $this->addSql('DROP TABLE le_team');
        $this->addSql('DROP TABLE le_team_attribute');
        $this->addSql('DROP TABLE le_trainer');
        $this->addSql('DROP TABLE le_match');
        $this->addSql('DROP TABLE le_match_event');
        $this->addSql('DROP TABLE le_player_performance');
        $this->addSql('DROP TABLE le_round');
        $this->addSql('DROP TABLE le_season');
        $this->addSql('DROP TABLE le_league_seasons');
    }
}

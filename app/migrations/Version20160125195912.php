<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160125195912 extends AbstractMigration
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
        $this->addSql('CREATE TABLE le_file (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, path VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, checksum VARCHAR(255) NOT NULL, checksum_type VARCHAR(30) NOT NULL, size INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_9EDBD610727ACA70 (parent_id), INDEX checksum_idx (checksum), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_activist (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expired TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', credentials_expired TINYINT(1) NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, pesel VARCHAR(12) DEFAULT NULL, gender ENUM(\'man\', \'woman\') NOT NULL COMMENT \'(DC2Type:gender_type)\', first_name VARCHAR(40) DEFAULT NULL, last_name VARCHAR(40) DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_53CAC8C992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_53CAC8C9A0D96FBF (email_canonical), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
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
        $this->addSql('CREATE TABLE le_category (id INT AUTO_INCREMENT NOT NULL, league_id INT DEFAULT NULL, team_id INT DEFAULT NULL, title VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, deleted_at DATETIME DEFAULT NULL, INDEX IDX_C802322858AFC4DE (league_id), INDEX IDX_C8023228296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_news_categories (category_id INT NOT NULL, news_id INT NOT NULL, INDEX IDX_5C8EF83D12469DE2 (category_id), INDEX IDX_5C8EF83DB5A459A0 (news_id), PRIMARY KEY(category_id, news_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_news (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, updated_by INT DEFAULT NULL, image_id INT DEFAULT NULL, team_id INT DEFAULT NULL, league_id INT DEFAULT NULL, title VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, introduction VARCHAR(255) NOT NULL, body VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, published_at DATETIME DEFAULT NULL, source VARCHAR(255) DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, INDEX IDX_F977950F675F31B (author_id), INDEX IDX_F97795016FE72E1 (updated_by), UNIQUE INDEX UNIQ_F9779503DA5256D (image_id), INDEX IDX_F977950296CD8AE (team_id), INDEX IDX_F97795058AFC4DE (league_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news_category (news_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_4F72BA90B5A459A0 (news_id), INDEX IDX_4F72BA9012469DE2 (category_id), PRIMARY KEY(news_id, category_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_news_allowed_users (news_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_E9A7DDBBB5A459A0 (news_id), INDEX IDX_E9A7DDBBA76ED395 (user_id), PRIMARY KEY(news_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expired TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', credentials_expired TINYINT(1) NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, role VARCHAR(30) NOT NULL, pesel VARCHAR(12) DEFAULT NULL, gender ENUM(\'man\', \'woman\') NOT NULL COMMENT \'(DC2Type:gender_type)\', first_name VARCHAR(40) DEFAULT NULL, last_name VARCHAR(40) DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, discr VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical), INDEX role_idx (role), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE league_referees (referee_id INT NOT NULL, league_id INT NOT NULL, INDEX IDX_A4B108B74A087CA2 (referee_id), INDEX IDX_A4B108B758AFC4DE (league_id), PRIMARY KEY(referee_id, league_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fos_user_attribute (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, value LONGTEXT NOT NULL, INDEX IDX_3C55E4DFA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE le_file ADD CONSTRAINT FK_9EDBD610727ACA70 FOREIGN KEY (parent_id) REFERENCES le_file (id) ON DELETE SET NULL');
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
        $this->addSql('ALTER TABLE le_category ADD CONSTRAINT FK_C802322858AFC4DE FOREIGN KEY (league_id) REFERENCES le_league (id)');
        $this->addSql('ALTER TABLE le_category ADD CONSTRAINT FK_C8023228296CD8AE FOREIGN KEY (team_id) REFERENCES le_team (id)');
        $this->addSql('ALTER TABLE le_news_categories ADD CONSTRAINT FK_5C8EF83D12469DE2 FOREIGN KEY (category_id) REFERENCES le_category (id)');
        $this->addSql('ALTER TABLE le_news_categories ADD CONSTRAINT FK_5C8EF83DB5A459A0 FOREIGN KEY (news_id) REFERENCES le_news (id)');
        $this->addSql('ALTER TABLE le_news ADD CONSTRAINT FK_F977950F675F31B FOREIGN KEY (author_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE le_news ADD CONSTRAINT FK_F97795016FE72E1 FOREIGN KEY (updated_by) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE le_news ADD CONSTRAINT FK_F9779503DA5256D FOREIGN KEY (image_id) REFERENCES le_file (id)');
        $this->addSql('ALTER TABLE le_news ADD CONSTRAINT FK_F977950296CD8AE FOREIGN KEY (team_id) REFERENCES le_team (id)');
        $this->addSql('ALTER TABLE le_news ADD CONSTRAINT FK_F97795058AFC4DE FOREIGN KEY (league_id) REFERENCES le_league (id)');
        $this->addSql('ALTER TABLE news_category ADD CONSTRAINT FK_4F72BA90B5A459A0 FOREIGN KEY (news_id) REFERENCES le_news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_category ADD CONSTRAINT FK_4F72BA9012469DE2 FOREIGN KEY (category_id) REFERENCES le_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE le_news_allowed_users ADD CONSTRAINT FK_E9A7DDBBB5A459A0 FOREIGN KEY (news_id) REFERENCES le_news (id)');
        $this->addSql('ALTER TABLE le_news_allowed_users ADD CONSTRAINT FK_E9A7DDBBA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE league_referees ADD CONSTRAINT FK_A4B108B74A087CA2 FOREIGN KEY (referee_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE league_referees ADD CONSTRAINT FK_A4B108B758AFC4DE FOREIGN KEY (league_id) REFERENCES le_league (id)');
        $this->addSql('ALTER TABLE fos_user_attribute ADD CONSTRAINT FK_3C55E4DFA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE le_file DROP FOREIGN KEY FK_9EDBD610727ACA70');
        $this->addSql('ALTER TABLE le_news DROP FOREIGN KEY FK_F9779503DA5256D');
        $this->addSql('ALTER TABLE le_league DROP FOREIGN KEY FK_9EBE3324BC38FF6A');
        $this->addSql('ALTER TABLE le_league_sub_leagues DROP FOREIGN KEY FK_11EEE22858AFC4DE');
        $this->addSql('ALTER TABLE le_league_sub_leagues DROP FOREIGN KEY FK_11EEE2284AA28260');
        $this->addSql('ALTER TABLE le_team DROP FOREIGN KEY FK_D6A4461F58AFC4DE');
        $this->addSql('ALTER TABLE le_round DROP FOREIGN KEY FK_C5FCAED458AFC4DE');
        $this->addSql('ALTER TABLE le_league_seasons DROP FOREIGN KEY FK_6AFDE97658AFC4DE');
        $this->addSql('ALTER TABLE le_category DROP FOREIGN KEY FK_C802322858AFC4DE');
        $this->addSql('ALTER TABLE le_news DROP FOREIGN KEY FK_F97795058AFC4DE');
        $this->addSql('ALTER TABLE league_referees DROP FOREIGN KEY FK_A4B108B758AFC4DE');
        $this->addSql('ALTER TABLE le_punishment DROP FOREIGN KEY FK_580A399AA76ED395');
        $this->addSql('ALTER TABLE le_match_event DROP FOREIGN KEY FK_C4E30F19A76ED395');
        $this->addSql('ALTER TABLE le_match_event DROP FOREIGN KEY FK_C4E30F19B02C53F8');
        $this->addSql('ALTER TABLE le_team DROP FOREIGN KEY FK_D6A4461F7E860E36');
        $this->addSql('ALTER TABLE le_player DROP FOREIGN KEY FK_38138A59296CD8AE');
        $this->addSql('ALTER TABLE le_team_attribute DROP FOREIGN KEY FK_2ADF3107296CD8AE');
        $this->addSql('ALTER TABLE le_trainer DROP FOREIGN KEY FK_EADA7E57296CD8AE');
        $this->addSql('ALTER TABLE le_match DROP FOREIGN KEY FK_7A4981E528CDC89C');
        $this->addSql('ALTER TABLE le_match DROP FOREIGN KEY FK_7A4981E58DEF089F');
        $this->addSql('ALTER TABLE le_category DROP FOREIGN KEY FK_C8023228296CD8AE');
        $this->addSql('ALTER TABLE le_news DROP FOREIGN KEY FK_F977950296CD8AE');
        $this->addSql('ALTER TABLE le_team DROP FOREIGN KEY FK_D6A4461FFB08EDF6');
        $this->addSql('ALTER TABLE le_match_event DROP FOREIGN KEY FK_C4E30F192ABEACD6');
        $this->addSql('ALTER TABLE le_round DROP FOREIGN KEY FK_C5FCAED44EC001D1');
        $this->addSql('ALTER TABLE le_league_seasons DROP FOREIGN KEY FK_6AFDE9764EC001D1');
        $this->addSql('ALTER TABLE le_news_categories DROP FOREIGN KEY FK_5C8EF83D12469DE2');
        $this->addSql('ALTER TABLE news_category DROP FOREIGN KEY FK_4F72BA9012469DE2');
        $this->addSql('ALTER TABLE le_news_categories DROP FOREIGN KEY FK_5C8EF83DB5A459A0');
        $this->addSql('ALTER TABLE news_category DROP FOREIGN KEY FK_4F72BA90B5A459A0');
        $this->addSql('ALTER TABLE le_news_allowed_users DROP FOREIGN KEY FK_E9A7DDBBB5A459A0');
        $this->addSql('ALTER TABLE le_news DROP FOREIGN KEY FK_F977950F675F31B');
        $this->addSql('ALTER TABLE le_news DROP FOREIGN KEY FK_F97795016FE72E1');
        $this->addSql('ALTER TABLE le_news_allowed_users DROP FOREIGN KEY FK_E9A7DDBBA76ED395');
        $this->addSql('ALTER TABLE league_referees DROP FOREIGN KEY FK_A4B108B74A087CA2');
        $this->addSql('ALTER TABLE fos_user_attribute DROP FOREIGN KEY FK_3C55E4DFA76ED395');
        $this->addSql('DROP TABLE ext_translations');
        $this->addSql('DROP TABLE ext_log_entries');
        $this->addSql('DROP TABLE le_address');
        $this->addSql('DROP TABLE le_file');
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
        $this->addSql('DROP TABLE le_category');
        $this->addSql('DROP TABLE le_news_categories');
        $this->addSql('DROP TABLE le_news');
        $this->addSql('DROP TABLE news_category');
        $this->addSql('DROP TABLE le_news_allowed_users');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('DROP TABLE league_referees');
        $this->addSql('DROP TABLE fos_user_attribute');
    }
}

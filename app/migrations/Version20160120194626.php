<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160120194626 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE file (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, path VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, checksum VARCHAR(255) NOT NULL, checksum_type VARCHAR(30) NOT NULL, size INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_8C9F3610727ACA70 (parent_id), INDEX checksum_idx (checksum), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, league_id INT DEFAULT NULL, team_id INT DEFAULT NULL, title VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, deleted_at DATETIME DEFAULT NULL, INDEX IDX_64C19C158AFC4DE (league_id), INDEX IDX_64C19C1296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_news_categories (category_id INT NOT NULL, news_id INT NOT NULL, INDEX IDX_5C8EF83D12469DE2 (category_id), INDEX IDX_5C8EF83DB5A459A0 (news_id), PRIMARY KEY(category_id, news_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, updated_by INT DEFAULT NULL, image_id INT DEFAULT NULL, team_id INT DEFAULT NULL, league_id INT DEFAULT NULL, title VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, introduction VARCHAR(255) NOT NULL, body VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, published_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, INDEX IDX_1DD39950F675F31B (author_id), UNIQUE INDEX UNIQ_1DD3995016FE72E1 (updated_by), UNIQUE INDEX UNIQ_1DD399503DA5256D (image_id), UNIQUE INDEX UNIQ_1DD39950296CD8AE (team_id), UNIQUE INDEX UNIQ_1DD3995058AFC4DE (league_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news_category (news_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_4F72BA90B5A459A0 (news_id), INDEX IDX_4F72BA9012469DE2 (category_id), PRIMARY KEY(news_id, category_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_news_allowed_users (news_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_E9A7DDBBB5A459A0 (news_id), INDEX IDX_E9A7DDBBA76ED395 (user_id), PRIMARY KEY(news_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE league_referees (referee_id INT NOT NULL, league_id INT NOT NULL, INDEX IDX_A4B108B74A087CA2 (referee_id), INDEX IDX_A4B108B758AFC4DE (league_id), PRIMARY KEY(referee_id, league_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F3610727ACA70 FOREIGN KEY (parent_id) REFERENCES file (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C158AFC4DE FOREIGN KEY (league_id) REFERENCES le_league (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1296CD8AE FOREIGN KEY (team_id) REFERENCES le_team (id)');
        $this->addSql('ALTER TABLE le_news_categories ADD CONSTRAINT FK_5C8EF83D12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE le_news_categories ADD CONSTRAINT FK_5C8EF83DB5A459A0 FOREIGN KEY (news_id) REFERENCES news (id)');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD39950F675F31B FOREIGN KEY (author_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD3995016FE72E1 FOREIGN KEY (updated_by) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD399503DA5256D FOREIGN KEY (image_id) REFERENCES file (id)');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD39950296CD8AE FOREIGN KEY (team_id) REFERENCES le_team (id)');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD3995058AFC4DE FOREIGN KEY (league_id) REFERENCES le_league (id)');
        $this->addSql('ALTER TABLE news_category ADD CONSTRAINT FK_4F72BA90B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_category ADD CONSTRAINT FK_4F72BA9012469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE le_news_allowed_users ADD CONSTRAINT FK_E9A7DDBBB5A459A0 FOREIGN KEY (news_id) REFERENCES news (id)');
        $this->addSql('ALTER TABLE le_news_allowed_users ADD CONSTRAINT FK_E9A7DDBBA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE league_referees ADD CONSTRAINT FK_A4B108B74A087CA2 FOREIGN KEY (referee_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE league_referees ADD CONSTRAINT FK_A4B108B758AFC4DE FOREIGN KEY (league_id) REFERENCES le_league (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_53CAC8C992FC23A8 ON le_activist (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_53CAC8C9A0D96FBF ON le_activist (email_canonical)');
        $this->addSql('ALTER TABLE fos_user DROP FOREIGN KEY FK_957A64798642ED32');
        $this->addSql('DROP INDEX IDX_957A64798642ED32 ON fos_user');
        $this->addSql('ALTER TABLE fos_user DROP leagues_id');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A647992FC23A8 ON fos_user (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A6479A0D96FBF ON fos_user (email_canonical)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F3610727ACA70');
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD399503DA5256D');
        $this->addSql('ALTER TABLE le_news_categories DROP FOREIGN KEY FK_5C8EF83D12469DE2');
        $this->addSql('ALTER TABLE news_category DROP FOREIGN KEY FK_4F72BA9012469DE2');
        $this->addSql('ALTER TABLE le_news_categories DROP FOREIGN KEY FK_5C8EF83DB5A459A0');
        $this->addSql('ALTER TABLE news_category DROP FOREIGN KEY FK_4F72BA90B5A459A0');
        $this->addSql('ALTER TABLE le_news_allowed_users DROP FOREIGN KEY FK_E9A7DDBBB5A459A0');
        $this->addSql('DROP TABLE file');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE le_news_categories');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE news_category');
        $this->addSql('DROP TABLE le_news_allowed_users');
        $this->addSql('DROP TABLE league_referees');
        $this->addSql('DROP INDEX UNIQ_957A647992FC23A8 ON fos_user');
        $this->addSql('DROP INDEX UNIQ_957A6479A0D96FBF ON fos_user');
        $this->addSql('ALTER TABLE fos_user ADD leagues_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fos_user ADD CONSTRAINT FK_957A64798642ED32 FOREIGN KEY (leagues_id) REFERENCES le_league (id)');
        $this->addSql('CREATE INDEX IDX_957A64798642ED32 ON fos_user (leagues_id)');
        $this->addSql('DROP INDEX UNIQ_53CAC8C992FC23A8 ON le_activist');
        $this->addSql('DROP INDEX UNIQ_53CAC8C9A0D96FBF ON le_activist');
    }
}

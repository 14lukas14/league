<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160126212559 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE le_news_tag (news_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_7070F348B5A459A0 (news_id), INDEX IDX_7070F348BAD26311 (tag_id), PRIMARY KEY(news_id, tag_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE le_tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE le_news_tag ADD CONSTRAINT FK_7070F348B5A459A0 FOREIGN KEY (news_id) REFERENCES le_news (id)');
        $this->addSql('ALTER TABLE le_news_tag ADD CONSTRAINT FK_7070F348BAD26311 FOREIGN KEY (tag_id) REFERENCES le_tag (id)');
        $this->addSql('DROP TABLE news_category');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE le_news_tag DROP FOREIGN KEY FK_7070F348BAD26311');
        $this->addSql('CREATE TABLE news_category (news_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_4F72BA90B5A459A0 (news_id), INDEX IDX_4F72BA9012469DE2 (category_id), PRIMARY KEY(news_id, category_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE news_category ADD CONSTRAINT FK_4F72BA9012469DE2 FOREIGN KEY (category_id) REFERENCES le_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_category ADD CONSTRAINT FK_4F72BA90B5A459A0 FOREIGN KEY (news_id) REFERENCES le_news (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE le_news_tag');
        $this->addSql('DROP TABLE le_tag');
    }
}

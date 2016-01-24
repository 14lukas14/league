<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160120232820 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE news DROP INDEX UNIQ_1DD3995016FE72E1, ADD INDEX IDX_1DD3995016FE72E1 (updated_by)');
        $this->addSql('ALTER TABLE news DROP INDEX UNIQ_1DD39950296CD8AE, ADD INDEX IDX_1DD39950296CD8AE (team_id)');
        $this->addSql('ALTER TABLE news DROP INDEX UNIQ_1DD3995058AFC4DE, ADD INDEX IDX_1DD3995058AFC4DE (league_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE news DROP INDEX IDX_1DD3995016FE72E1, ADD UNIQUE INDEX UNIQ_1DD3995016FE72E1 (updated_by)');
        $this->addSql('ALTER TABLE news DROP INDEX IDX_1DD39950296CD8AE, ADD UNIQUE INDEX UNIQ_1DD39950296CD8AE (team_id)');
        $this->addSql('ALTER TABLE news DROP INDEX IDX_1DD3995058AFC4DE, ADD UNIQUE INDEX UNIQ_1DD3995058AFC4DE (league_id)');
    }
}

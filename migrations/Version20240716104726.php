<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240716104726 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, store_id INT DEFAULT NULL, amount INT NOT NULL, price DOUBLE PRECISION NOT NULL, price_eur DOUBLE PRECISION DEFAULT NULL, currency VARCHAR(3) NOT NULL, measure VARCHAR(2) NOT NULL, weight DOUBLE PRECISION NOT NULL, multiple_pallet TINYINT(1) DEFAULT NULL, packaging_count INT NOT NULL, pallet DOUBLE PRECISION NOT NULL, packaging DOUBLE PRECISION NOT NULL, swimming_pool TINYINT(1) NOT NULL, INDEX IDX_23A0E66B092A811 (store_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bank_details (id INT AUTO_INCREMENT NOT NULL, inn VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delivery (id INT AUTO_INCREMENT NOT NULL, cost DOUBLE PRECISION NOT NULL, type SMALLINT NOT NULL, time_min DATE DEFAULT NULL, time_max DATE DEFAULT NULL, time_confirm_min DATE DEFAULT NULL, time_confirm_max DATE DEFAULT NULL, time_fast_pay_min DATE DEFAULT NULL, time_fast_pay_max DATE DEFAULT NULL, old_time_min DATE DEFAULT NULL, old_time_max DATE DEFAULT NULL, index_d VARCHAR(20) NOT NULL, country SMALLINT NOT NULL, region VARCHAR(50) DEFAULT NULL, city VARCHAR(200) NOT NULL, address VARCHAR(300) NOT NULL, building VARCHAR(200) DEFAULT NULL, phone VARCHAR(20) NOT NULL, pay_type SMALLINT NOT NULL, pay_date_execution DATETIME DEFAULT NULL, offset_date DATETIME DEFAULT NULL, offset_reason SMALLINT DEFAULT NULL, proposed_date DATETIME DEFAULT NULL, ship_date DATETIME DEFAULT NULL, tracking_number VARCHAR(50) NOT NULL, carrier_name VARCHAR(50) NOT NULL, carrier_contact_data VARCHAR(255) NOT NULL, cancel_date DATETIME DEFAULT NULL, fact_data DATETIME DEFAULT NULL, price_euro DOUBLE PRECISION DEFAULT NULL, address_payer INT NOT NULL, sending_date DATETIME DEFAULT NULL, calculate_type SMALLINT NOT NULL, apartment_office VARCHAR(30) DEFAULT NULL, INDEX country_idx (country), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_ (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, delivery_id INT DEFAULT NULL, bank_details_id INT DEFAULT NULL, hash VARCHAR(20) NOT NULL, token VARCHAR(20) NOT NULL, number INT DEFAULT NULL, status SMALLINT NOT NULL, email VARCHAR(100) DEFAULT NULL, vat_type SMALLINT NOT NULL, vat_number VARCHAR(100) DEFAULT NULL, tax_number VARCHAR(50) DEFAULT NULL, discount SMALLINT DEFAULT NULL, locale VARCHAR(5) NOT NULL, cur_rate DOUBLE PRECISION NOT NULL, currency VARCHAR(3) NOT NULL, measure VARCHAR(3) NOT NULL, name VARCHAR(200) NOT NULL, description LONGTEXT DEFAULT NULL, step TINYINT(1) NOT NULL, address_equal TINYINT(1) DEFAULT NULL, bank_transfer_requested TINYINT(1) DEFAULT NULL, accept_pay TINYINT(1) DEFAULT NULL, weight_gross DOUBLE PRECISION DEFAULT NULL, product_review TINYINT(1) DEFAULT NULL, mirror SMALLINT DEFAULT NULL, process TINYINT(1) DEFAULT NULL, entrance_review INT DEFAULT NULL, payment_euro TINYINT(1) DEFAULT NULL, spec_price TINYINT(1) DEFAULT NULL, show_msg TINYINT(1) DEFAULT NULL, full_payment_date DATE DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_D7F7910DD1B862B8 (hash), INDEX IDX_D7F7910DA76ED395 (user_id), UNIQUE INDEX UNIQ_D7F7910D12136921 (delivery_id), INDEX IDX_D7F7910D32BAC194 (bank_details_id), INDEX crated_at_idx (created_at), INDEX created_at_status_idx (created_at, status), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_article (order_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_F440A72D8D9F6D38 (order_id), UNIQUE INDEX UNIQ_F440A72D7294869C (article_id), PRIMARY KEY(order_id, article_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE store (id INT AUTO_INCREMENT NOT NULL, address VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, working_hours VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, sex SMALLINT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, surname VARCHAR(255) DEFAULT NULL, company_name VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66B092A811 FOREIGN KEY (store_id) REFERENCES store (id)');
        $this->addSql('ALTER TABLE order_ ADD CONSTRAINT FK_D7F7910DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE order_ ADD CONSTRAINT FK_D7F7910D12136921 FOREIGN KEY (delivery_id) REFERENCES delivery (id)');
        $this->addSql('ALTER TABLE order_ ADD CONSTRAINT FK_D7F7910D32BAC194 FOREIGN KEY (bank_details_id) REFERENCES bank_details (id)');
        $this->addSql('ALTER TABLE order_article ADD CONSTRAINT FK_F440A72D8D9F6D38 FOREIGN KEY (order_id) REFERENCES order_ (id)');
        $this->addSql('ALTER TABLE order_article ADD CONSTRAINT FK_F440A72D7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_article DROP FOREIGN KEY FK_F440A72D7294869C');
        $this->addSql('ALTER TABLE order_ DROP FOREIGN KEY FK_D7F7910D32BAC194');
        $this->addSql('ALTER TABLE order_ DROP FOREIGN KEY FK_D7F7910D12136921');
        $this->addSql('ALTER TABLE order_article DROP FOREIGN KEY FK_F440A72D8D9F6D38');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66B092A811');
        $this->addSql('ALTER TABLE order_ DROP FOREIGN KEY FK_D7F7910DA76ED395');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE bank_details');
        $this->addSql('DROP TABLE delivery');
        $this->addSql('DROP TABLE order_');
        $this->addSql('DROP TABLE order_article');
        $this->addSql('DROP TABLE store');
        $this->addSql('DROP TABLE user');
    }
}

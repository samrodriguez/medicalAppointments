<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201008063708 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE cita_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE especialidad_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE paciente_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE cita (id INT NOT NULL, paciente_id INT NOT NULL, especialidad_id INT NOT NULL, fecha DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3E379A627310DAD4 ON cita (paciente_id)');
        $this->addSql('CREATE INDEX IDX_3E379A6216A490EC ON cita (especialidad_id)');
        $this->addSql('CREATE TABLE especialidad (id INT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE paciente (id INT NOT NULL, dui VARCHAR(10) NOT NULL, expediente VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, fecha DATE NOT NULL, direccion VARCHAR(255) DEFAULT NULL, telefono VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE cita ADD CONSTRAINT FK_3E379A627310DAD4 FOREIGN KEY (paciente_id) REFERENCES paciente (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cita ADD CONSTRAINT FK_3E379A6216A490EC FOREIGN KEY (especialidad_id) REFERENCES especialidad (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE cita DROP CONSTRAINT FK_3E379A6216A490EC');
        $this->addSql('ALTER TABLE cita DROP CONSTRAINT FK_3E379A627310DAD4');
        $this->addSql('DROP SEQUENCE cita_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE especialidad_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE paciente_id_seq CASCADE');
        $this->addSql('DROP TABLE cita');
        $this->addSql('DROP TABLE especialidad');
        $this->addSql('DROP TABLE paciente');
    }
}

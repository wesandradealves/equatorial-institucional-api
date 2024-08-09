<?php
// Configurações de conexão
$host = 'drupal-postgres.institucional-drupal-ma-dev.svc.cluster.local';
$dbname = 'drupal-database';
$user = 'drupal-user';
$password = 'drupal-pass';

try {
    // Conectar ao banco de dados
    $dsn = "pgsql:host=$host;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    // Script SQL de criação de tabela e índices
    $sql = "

CREATE TABLE IF NOT EXISTS locales_location (
	lid bigserial NOT NULL,
	sid int8 NOT NULL,
	\"type\" varchar(50) DEFAULT ''::character varying NOT NULL,
	\"name\" varchar(255) DEFAULT ''::character varying NOT NULL,
	\"version\" varchar(20) DEFAULT 'none'::character varying NOT NULL,
	CONSTRAINT idx_28383_primary PRIMARY KEY (lid)
);
CREATE INDEX idx_28383_string_type ON locales_location USING btree (sid, type);
CREATE INDEX idx_28383_type_name ON locales_location USING btree (type, name);


CREATE TABLE locales_source (
	lid bigserial NOT NULL,
	\"source\" bytea NOT NULL,
	context varchar(255) DEFAULT ''::character varying NOT NULL,
	\"version\" varchar(20) DEFAULT 'none'::character varying NOT NULL,
	CONSTRAINT idx_28392_primary PRIMARY KEY (lid)
);
CREATE INDEX idx_28392_source_context ON locales_source USING btree (source, context);

CREATE TABLE locales_target (
	lid int8 DEFAULT '0'::bigint NOT NULL,
	\"translation\" bytea NOT NULL,
	\"language\" varchar(12) DEFAULT ''::character varying NOT NULL,
	customized int8 DEFAULT '0'::bigint NOT NULL,
	CONSTRAINT idx_28401_primary PRIMARY KEY (language, lid)
);
CREATE INDEX idx_28401_lid ON locales_target USING btree (lid);
    ";

    // Executar o script SQL
    $pdo->exec($sql);

    echo "Tabela e índices criados com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao criar tabela e índices: " . $e->getMessage();
}

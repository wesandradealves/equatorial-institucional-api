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

CREATE TABLE IF NOT EXISTS  locale_file (
	project varchar(255) DEFAULT ''::character varying NOT NULL,
	langcode varchar(12) DEFAULT ''::character varying NOT NULL,
	filename varchar(255) DEFAULT ''::character varying NOT NULL,
	\"version\" varchar(128) DEFAULT ''::character varying NOT NULL,
	uri varchar(255) DEFAULT ''::character varying NOT NULL,
	\"timestamp\" int8 DEFAULT '0'::bigint NULL,
	last_checked int8 DEFAULT '0'::bigint NULL,
	CONSTRAINT idx_28410_primary PRIMARY KEY (project, langcode)
);


    ";

    // Executar o script SQL
    $pdo->exec($sql);

    echo "Tabela e índices criados com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao criar tabela e índices: " . $e->getMessage();
}

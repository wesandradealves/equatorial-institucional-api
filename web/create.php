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



CREATE TABLE IF NOT EXISTS block_content__field_atalho_clara (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_atalho_clara_target_id int8 NOT NULL,
        field_atalho_clara_alt varchar(512) DEFAULT NULL::character varying NULL,
        field_atalho_clara_title varchar(1024) DEFAULT NULL::character varying NULL,
        field_atalho_clara_width int8 NULL,
        field_atalho_clara_height int8 NULL,
        CONSTRAINT idx_28013_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_28013_bundle ON block_content__field_atalho_clara USING btree (bundle);
CREATE INDEX idx_28013_field_atalho_clara_target_id ON block_content__field_atalho_clara USING btree (field_atalho_clara_target_id);
CREATE INDEX idx_28013_revision_id ON block_content__field_atalho_clara USING btree (revision_id);



CREATE TABLE IF NOT EXISTS block_content__field_cta_label (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_cta_label_value varchar(255) NOT NULL,
        CONSTRAINT idx_28024_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_28024_bundle ON block_content__field_cta_label USING btree (bundle);
CREATE INDEX idx_28024_revision_id ON block_content__field_cta_label USING btree (revision_id);



CREATE TABLE IF NOT EXISTS block_content__field_cta_url (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_cta_url_value varchar(255) NOT NULL,
        CONSTRAINT idx_28030_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_28030_bundle ON block_content__field_cta_url USING btree (bundle);
CREATE INDEX idx_28030_revision_id ON block_content__field_cta_url USING btree (revision_id);



CREATE TABLE IF NOT EXISTS block_content__field_imagem (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_imagem_target_id int8 NOT NULL,
        field_imagem_alt varchar(512) DEFAULT NULL::character varying NULL,
        field_imagem_title varchar(1024) DEFAULT NULL::character varying NULL,
        field_imagem_width int8 NULL,
        field_imagem_height int8 NULL,
        CONSTRAINT idx_28036_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_28036_bundle ON block_content__field_imagem USING btree (bundle);
CREATE INDEX idx_28036_field_imagem_target_id ON block_content__field_imagem USING btree (field_imagem_target_id);
CREATE INDEX idx_28036_revision_id ON block_content__field_imagem USING btree (revision_id);



CREATE TABLE IF NOT EXISTS block_content__field_servicos (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_servicos_target_id int8 NOT NULL,
        field_servicos_target_revision_id int8 NOT NULL,
        CONSTRAINT idx_28047_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_28047_bundle ON block_content__field_servicos USING btree (bundle);
CREATE INDEX idx_28047_field_servicos_target_id ON block_content__field_servicos USING btree (field_servicos_target_id);
CREATE INDEX idx_28047_field_servicos_target_revision_id ON block_content__field_servicos USING btree (field_servicos_target_revision_id);
CREATE INDEX idx_28047_revision_id ON block_content__field_servicos USING btree (revision_id);



CREATE TABLE IF NOT EXISTS block_content__field_texto (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_texto_value text NOT NULL,
        field_texto_format varchar(255) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_28053_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_28053_bundle ON block_content__field_texto USING btree (bundle);
CREATE INDEX idx_28053_field_texto_format ON block_content__field_texto USING btree (field_texto_format);
CREATE INDEX idx_28053_revision_id ON block_content__field_texto USING btree (revision_id);



CREATE TABLE IF NOT EXISTS block_content__field_titulo (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_titulo_value text NOT NULL,
        field_titulo_format varchar(255) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_28063_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_28063_bundle ON block_content__field_titulo USING btree (bundle);
CREATE INDEX idx_28063_field_titulo_format ON block_content__field_titulo USING btree (field_titulo_format);
CREATE INDEX idx_28063_revision_id ON block_content__field_titulo USING btree (revision_id);




CREATE TABLE IF NOT EXISTS block_content_revision__field_atalho_clara (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_atalho_clara_target_id int8 NOT NULL,
        field_atalho_clara_alt varchar(512) DEFAULT NULL::character varying NULL,
        field_atalho_clara_title varchar(1024) DEFAULT NULL::character varying NULL,
        field_atalho_clara_width int8 NULL,
        field_atalho_clara_height int8 NULL,
        CONSTRAINT idx_27943_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_27943_bundle ON block_content_revision__field_atalho_clara USING btree (bundle);
CREATE INDEX idx_27943_field_atalho_clara_target_id ON block_content_revision__field_atalho_clara USING btree (field_atalho_clara_target_id);
CREATE INDEX idx_27943_revision_id ON block_content_revision__field_atalho_clara USING btree (revision_id);



CREATE TABLE IF NOT EXISTS block_content_revision__field_cta_label (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_cta_label_value varchar(255) NOT NULL,
        CONSTRAINT idx_27954_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_27954_bundle ON block_content_revision__field_cta_label USING btree (bundle);
CREATE INDEX idx_27954_revision_id ON block_content_revision__field_cta_label USING btree (revision_id);



CREATE TABLE IF NOT EXISTS block_content_revision__field_cta_url (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_cta_url_value varchar(255) NOT NULL,
        CONSTRAINT idx_27960_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_27960_bundle ON block_content_revision__field_cta_url USING btree (bundle);
CREATE INDEX idx_27960_revision_id ON block_content_revision__field_cta_url USING btree (revision_id);



CREATE TABLE IF NOT EXISTS block_content_revision__field_imagem (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_imagem_target_id int8 NOT NULL,
        field_imagem_alt varchar(512) DEFAULT NULL::character varying NULL,
        field_imagem_title varchar(1024) DEFAULT NULL::character varying NULL,
        field_imagem_width int8 NULL,
        field_imagem_height int8 NULL,
        CONSTRAINT idx_27966_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_27966_bundle ON block_content_revision__field_imagem USING btree (bundle);
CREATE INDEX idx_27966_field_imagem_target_id ON block_content_revision__field_imagem USING btree (field_imagem_target_id);
CREATE INDEX idx_27966_revision_id ON block_content_revision__field_imagem USING btree (revision_id);



CREATE TABLE IF NOT EXISTS block_content_revision__field_servicos (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_servicos_target_id int8 NOT NULL,
        field_servicos_target_revision_id int8 NOT NULL,
        CONSTRAINT idx_27977_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_27977_bundle ON block_content_revision__field_servicos USING btree (bundle);
CREATE INDEX idx_27977_field_servicos_target_id ON block_content_revision__field_servicos USING btree (field_servicos_target_id);
CREATE INDEX idx_27977_field_servicos_target_revision_id ON block_content_revision__field_servicos USING btree (field_servicos_target_revision_id);
CREATE INDEX idx_27977_revision_id ON block_content_revision__field_servicos USING btree (revision_id);



CREATE TABLE IF NOT EXISTS block_content_revision__field_texto (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_texto_value text NOT NULL,
        field_texto_format varchar(255) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_27983_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_27983_bundle ON block_content_revision__field_texto USING btree (bundle);
CREATE INDEX idx_27983_field_texto_format ON block_content_revision__field_texto USING btree (field_texto_format);
CREATE INDEX idx_27983_revision_id ON block_content_revision__field_texto USING btree (revision_id);



CREATE TABLE IF NOT EXISTS block_content_revision__field_titulo (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_titulo_value text NOT NULL,
        field_titulo_format varchar(255) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_27993_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_27993_bundle ON block_content_revision__field_titulo USING btree (bundle);
CREATE INDEX idx_27993_field_titulo_format ON block_content_revision__field_titulo USING btree (field_titulo_format);
CREATE INDEX idx_27993_revision_id ON block_content_revision__field_titulo USING btree (revision_id);



CREATE TABLE IF NOT EXISTS cache_access_policy (
        cid varchar(255) DEFAULT ''::character varying NOT NULL,
        \"data\" bytea NULL,
        expire int8 DEFAULT '0'::bigint NOT NULL,
        created numeric(14, 3) DEFAULT 0.000 NOT NULL,
        serialized int2 DEFAULT '0'::smallint NOT NULL,
        tags text NULL,
        checksum varchar(255) NOT NULL,
        CONSTRAINT idx_28078_primary PRIMARY KEY (cid)
);
CREATE INDEX idx_28078_created ON cache_access_policy USING btree (created);
CREATE INDEX idx_28078_expire ON cache_access_policy USING btree (expire);



CREATE TABLE IF NOT EXISTS cache_bootstrap (
        cid varchar(255) DEFAULT ''::character varying NOT NULL,
        \"data\" bytea NULL,
        expire int8 DEFAULT '0'::bigint NOT NULL,
        created numeric(14, 3) DEFAULT 0.000 NOT NULL,
        serialized int2 DEFAULT '0'::smallint NOT NULL,
        tags text NULL,
        checksum varchar(255) NOT NULL,
        CONSTRAINT idx_28088_primary PRIMARY KEY (cid)
);
CREATE INDEX idx_28088_created ON cache_bootstrap USING btree (created);
CREATE INDEX idx_28088_expire ON cache_bootstrap USING btree (expire);



CREATE TABLE IF NOT EXISTS cache_config (
        cid varchar(255) DEFAULT ''::character varying NOT NULL,
        \"data\" bytea NULL,
        expire int8 DEFAULT '0'::bigint NOT NULL,
        created numeric(14, 3) DEFAULT 0.000 NOT NULL,
        serialized int2 DEFAULT '0'::smallint NOT NULL,
        tags text NULL,
        checksum varchar(255) NOT NULL,
        CONSTRAINT idx_28098_primary PRIMARY KEY (cid)
);
CREATE INDEX idx_28098_created ON cache_config USING btree (created);
CREATE INDEX idx_28098_expire ON cache_config USING btree (expire);





CREATE TABLE IF NOT EXISTS cache_data (
        cid varchar(255) DEFAULT ''::character varying NOT NULL,
        \"data\" bytea NULL,
        expire int8 DEFAULT '0'::bigint NOT NULL,
        created numeric(14, 3) DEFAULT 0.000 NOT NULL,
        serialized int2 DEFAULT '0'::smallint NOT NULL,
        tags text NULL,
        checksum varchar(255) NOT NULL,
        CONSTRAINT idx_28118_primary PRIMARY KEY (cid)
);
CREATE INDEX idx_28118_created ON cache_data USING btree (created);
CREATE INDEX idx_28118_expire ON cache_data USING btree (expire);



CREATE TABLE IF NOT EXISTS cache_default (
        cid varchar(255) DEFAULT ''::character varying NOT NULL,
        \"data\" bytea NULL,
        expire int8 DEFAULT '0'::bigint NOT NULL,
        created numeric(14, 3) DEFAULT 0.000 NOT NULL,
        serialized int2 DEFAULT '0'::smallint NOT NULL,
        tags text NULL,
        checksum varchar(255) NOT NULL,
        CONSTRAINT idx_28128_primary PRIMARY KEY (cid)
);
CREATE INDEX idx_28128_created ON cache_default USING btree (created);
CREATE INDEX idx_28128_expire ON cache_default USING btree (expire);



CREATE TABLE IF NOT EXISTS cache_discovery (
        cid varchar(255) DEFAULT ''::character varying NOT NULL,
        \"data\" bytea NULL,
        expire int8 DEFAULT '0'::bigint NOT NULL,
        created numeric(14, 3) DEFAULT 0.000 NOT NULL,
        serialized int2 DEFAULT '0'::smallint NOT NULL,
        tags text NULL,
        checksum varchar(255) NOT NULL,
        CONSTRAINT idx_28138_primary PRIMARY KEY (cid)
);
CREATE INDEX idx_28138_created ON cache_discovery USING btree (created);
CREATE INDEX idx_28138_expire ON cache_discovery USING btree (expire);



CREATE TABLE IF NOT EXISTS cache_discovery_migration (
        cid varchar(255) DEFAULT ''::character varying NOT NULL,
        \"data\" bytea NULL,
        expire int8 DEFAULT '0'::bigint NOT NULL,
        created numeric(14, 3) DEFAULT 0.000 NOT NULL,
        serialized int2 DEFAULT '0'::smallint NOT NULL,
        tags text NULL,
        checksum varchar(255) NOT NULL,
        CONSTRAINT idx_28148_primary PRIMARY KEY (cid)
);
CREATE INDEX idx_28148_created ON cache_discovery_migration USING btree (created);
CREATE INDEX idx_28148_expire ON cache_discovery_migration USING btree (expire);



CREATE TABLE IF NOT EXISTS cache_dynamic_page_cache (
        cid varchar(255) DEFAULT ''::character varying NOT NULL,
        \"data\" bytea NULL,
        expire int8 DEFAULT '0'::bigint NOT NULL,
        created numeric(14, 3) DEFAULT 0.000 NOT NULL,
        serialized int2 DEFAULT '0'::smallint NOT NULL,
        tags text NULL,
        checksum varchar(255) NOT NULL,
        CONSTRAINT idx_28158_primary PRIMARY KEY (cid)
);
CREATE INDEX idx_28158_created ON cache_dynamic_page_cache USING btree (created);
CREATE INDEX idx_28158_expire ON cache_dynamic_page_cache USING btree (expire);



CREATE TABLE IF NOT EXISTS cache_entity (
        cid varchar(255) DEFAULT ''::character varying NOT NULL,
        \"data\" bytea NULL,
        expire int8 DEFAULT '0'::bigint NOT NULL,
        created numeric(14, 3) DEFAULT 0.000 NOT NULL,
        serialized int2 DEFAULT '0'::smallint NOT NULL,
        tags text NULL,
        checksum varchar(255) NOT NULL,
        CONSTRAINT idx_28168_primary PRIMARY KEY (cid)
);
CREATE INDEX idx_28168_created ON cache_entity USING btree (created);
CREATE INDEX idx_28168_expire ON cache_entity USING btree (expire);



CREATE TABLE IF NOT EXISTS cache_jsonapi_normalizations (
        cid varchar(255) DEFAULT ''::character varying NOT NULL,
        \"data\" bytea NULL,
        expire int8 DEFAULT '0'::bigint NOT NULL,
        created numeric(14, 3) DEFAULT 0.000 NOT NULL,
        serialized int2 DEFAULT '0'::smallint NOT NULL,
        tags text NULL,
        checksum varchar(255) NOT NULL,
        CONSTRAINT idx_28178_primary PRIMARY KEY (cid)
);
CREATE INDEX idx_28178_created ON cache_jsonapi_normalizations USING btree (created);
CREATE INDEX idx_28178_expire ON cache_jsonapi_normalizations USING btree (expire);



CREATE TABLE IF NOT EXISTS cache_menu (
        cid varchar(255) DEFAULT ''::character varying NOT NULL,
        \"data\" bytea NULL,
        expire int8 DEFAULT '0'::bigint NOT NULL,
        created numeric(14, 3) DEFAULT 0.000 NOT NULL,
        serialized int2 DEFAULT '0'::smallint NOT NULL,
        tags text NULL,
        checksum varchar(255) NOT NULL,
        CONSTRAINT idx_28188_primary PRIMARY KEY (cid)
);
CREATE INDEX idx_28188_created ON cache_menu USING btree (created);
CREATE INDEX idx_28188_expire ON cache_menu USING btree (expire);



CREATE TABLE IF NOT EXISTS cache_migrate (
        cid varchar(255) DEFAULT ''::character varying NOT NULL,
        \"data\" bytea NULL,
        expire int8 DEFAULT '0'::bigint NOT NULL,
        created numeric(14, 3) DEFAULT 0.000 NOT NULL,
        serialized int2 DEFAULT '0'::smallint NOT NULL,
        tags text NULL,
        checksum varchar(255) NOT NULL,
        CONSTRAINT idx_28198_primary PRIMARY KEY (cid)
);
CREATE INDEX idx_28198_created ON cache_migrate USING btree (created);
CREATE INDEX idx_28198_expire ON cache_migrate USING btree (expire);



CREATE TABLE IF NOT EXISTS cache_page (
        cid varchar(255) DEFAULT ''::character varying NOT NULL,
        \"data\" bytea NULL,
        expire int8 DEFAULT '0'::bigint NOT NULL,
        created numeric(14, 3) DEFAULT 0.000 NOT NULL,
        serialized int2 DEFAULT '0'::smallint NOT NULL,
        tags text NULL,
        checksum varchar(255) NOT NULL,
        CONSTRAINT idx_28208_primary PRIMARY KEY (cid)
);
CREATE INDEX idx_28208_created ON cache_page USING btree (created);
CREATE INDEX idx_28208_expire ON cache_page USING btree (expire);



CREATE TABLE IF NOT EXISTS cache_render (
        cid varchar(255) DEFAULT ''::character varying NOT NULL,
        \"data\" bytea NULL,
        expire int8 DEFAULT '0'::bigint NOT NULL,
        created numeric(14, 3) DEFAULT 0.000 NOT NULL,
        serialized int2 DEFAULT '0'::smallint NOT NULL,
        tags text NULL,
        checksum varchar(255) NOT NULL,
        CONSTRAINT idx_28218_primary PRIMARY KEY (cid)
);
CREATE INDEX idx_28218_created ON cache_render USING btree (created);
CREATE INDEX idx_28218_expire ON cache_render USING btree (expire);



CREATE TABLE IF NOT EXISTS cache_rest (
        cid varchar(255) DEFAULT ''::character varying NOT NULL,
        \"data\" bytea NULL,
        expire int8 DEFAULT '0'::bigint NOT NULL,
        created numeric(14, 3) DEFAULT 0.000 NOT NULL,
        serialized int2 DEFAULT '0'::smallint NOT NULL,
        tags text NULL,
        checksum varchar(255) NOT NULL,
        CONSTRAINT idx_28228_primary PRIMARY KEY (cid)
);
CREATE INDEX idx_28228_created ON cache_rest USING btree (created);
CREATE INDEX idx_28228_expire ON cache_rest USING btree (expire);



CREATE TABLE IF NOT EXISTS cache_toolbar (
        cid varchar(255) DEFAULT ''::character varying NOT NULL,
        \"data\" bytea NULL,
        expire int8 DEFAULT '0'::bigint NOT NULL,
        created numeric(14, 3) DEFAULT 0.000 NOT NULL,
        serialized int2 DEFAULT '0'::smallint NOT NULL,
        tags text NULL,
        checksum varchar(255) NOT NULL,
        CONSTRAINT idx_28238_primary PRIMARY KEY (cid)
);
CREATE INDEX idx_28238_created ON cache_toolbar USING btree (created);
CREATE INDEX idx_28238_expire ON cache_toolbar USING btree (expire);



CREATE TABLE IF NOT EXISTS cachetags (
        tag varchar(255) DEFAULT ''::character varying NOT NULL,
        invalidations int8 DEFAULT '0'::bigint NOT NULL,
        CONSTRAINT idx_28073_primary PRIMARY KEY (tag)
);






CREATE TABLE IF NOT EXISTS config_export (
        collection varchar(255) DEFAULT ''::character varying NOT NULL,
        \"name\" varchar(255) DEFAULT ''::character varying NOT NULL,
        \"data\" bytea NULL,
        CONSTRAINT idx_28294_primary PRIMARY KEY (collection, name)
);



CREATE TABLE IF NOT EXISTS config_import (
        collection varchar(255) DEFAULT ''::character varying NOT NULL,
        \"name\" varchar(255) DEFAULT ''::character varying NOT NULL,
        \"data\" bytea NULL,
        CONSTRAINT idx_28302_primary PRIMARY KEY (collection, name)
);



CREATE TABLE IF NOT EXISTS config_snapshot (
        collection varchar(255) DEFAULT ''::character varying NOT NULL,
        \"name\" varchar(255) DEFAULT ''::character varying NOT NULL,
        \"data\" bytea NULL,
        CONSTRAINT idx_28310_primary PRIMARY KEY (collection, name)
);




CREATE TABLE IF NOT EXISTS flood (
        fid bigserial NOT NULL,
        \"event\" varchar(64) DEFAULT ''::character varying NOT NULL,
        identifier varchar(128) DEFAULT ''::character varying NOT NULL,
        \"timestamp\" int8 DEFAULT '0'::bigint NOT NULL,
        expiration int8 DEFAULT '0'::bigint NOT NULL,
        CONSTRAINT idx_28338_primary PRIMARY KEY (fid)
);
CREATE INDEX idx_28338_allow ON flood USING btree (event, identifier, \"timestamp\");
CREATE INDEX idx_28338_purge ON flood USING btree (expiration);





CREATE TABLE IF NOT EXISTS key_value_expire (
        collection varchar(128) DEFAULT ''::character varying NOT NULL,
        \"name\" varchar(128) DEFAULT ''::character varying NOT NULL,
        value bytea NOT NULL,
        expire int8 DEFAULT '2147483647'::bigint NOT NULL,
        CONSTRAINT idx_28372_primary PRIMARY KEY (collection, name)
);
CREATE INDEX idx_28372_expire ON key_value_expire USING btree (expire);


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



CREATE TABLE IF NOT EXISTS media (
        mid bigserial NOT NULL,
        vid int8 NULL,
        bundle varchar(32) NOT NULL,
        \"uuid\" varchar(128) NOT NULL,
        langcode varchar(12) NOT NULL,
        CONSTRAINT idx_28425_primary PRIMARY KEY (mid)
);
CREATE UNIQUE INDEX idx_28425_media__vid ON media USING btree (vid);
CREATE INDEX idx_28425_media_field__bundle__target_id ON media USING btree (bundle);
CREATE UNIQUE INDEX idx_28425_media_field__uuid__value ON media USING btree (uuid);



CREATE TABLE IF NOT EXISTS media__field_media_audio_file (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_media_audio_file_target_id int8 NOT NULL,
        field_media_audio_file_display int2 DEFAULT '1'::smallint NULL,
        field_media_audio_file_description text NULL,
        CONSTRAINT idx_28514_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_28514_bundle ON media__field_media_audio_file USING btree (bundle);
CREATE INDEX idx_28514_field_media_audio_file_target_id ON media__field_media_audio_file USING btree (field_media_audio_file_target_id);
CREATE INDEX idx_28514_revision_id ON media__field_media_audio_file USING btree (revision_id);



CREATE TABLE IF NOT EXISTS media__field_media_document (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_media_document_target_id int8 NOT NULL,
        field_media_document_display int2 DEFAULT '1'::smallint NULL,
        field_media_document_description text NULL,
        CONSTRAINT idx_28524_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_28524_bundle ON media__field_media_document USING btree (bundle);
CREATE INDEX idx_28524_field_media_document_target_id ON media__field_media_document USING btree (field_media_document_target_id);
CREATE INDEX idx_28524_revision_id ON media__field_media_document USING btree (revision_id);



CREATE TABLE IF NOT EXISTS media__field_media_image (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_media_image_target_id int8 NOT NULL,
        field_media_image_alt varchar(512) DEFAULT NULL::character varying NULL,
        field_media_image_title varchar(1024) DEFAULT NULL::character varying NULL,
        field_media_image_width int8 NULL,
        field_media_image_height int8 NULL,
        CONSTRAINT idx_28534_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_28534_bundle ON media__field_media_image USING btree (bundle);
CREATE INDEX idx_28534_field_media_image_target_id ON media__field_media_image USING btree (field_media_image_target_id);
CREATE INDEX idx_28534_revision_id ON media__field_media_image USING btree (revision_id);



CREATE TABLE IF NOT EXISTS media__field_media_oembed_video (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_media_oembed_video_value varchar(255) NOT NULL,
        CONSTRAINT idx_28545_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_28545_bundle ON media__field_media_oembed_video USING btree (bundle);
CREATE INDEX idx_28545_revision_id ON media__field_media_oembed_video USING btree (revision_id);



CREATE TABLE IF NOT EXISTS media__field_media_svg (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_media_svg_target_id int8 NOT NULL,
        field_media_svg_alt varchar(512) DEFAULT NULL::character varying NULL,
        field_media_svg_title varchar(1024) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_28551_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_28551_bundle ON media__field_media_svg USING btree (bundle);
CREATE INDEX idx_28551_field_media_svg_target_id ON media__field_media_svg USING btree (field_media_svg_target_id);
CREATE INDEX idx_28551_revision_id ON media__field_media_svg USING btree (revision_id);



CREATE TABLE IF NOT EXISTS media__field_media_video_file (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_media_video_file_target_id int8 NOT NULL,
        field_media_video_file_display int2 DEFAULT '1'::smallint NULL,
        field_media_video_file_description text NULL,
        CONSTRAINT idx_28562_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_28562_bundle ON media__field_media_video_file USING btree (bundle);
CREATE INDEX idx_28562_field_media_video_file_target_id ON media__field_media_video_file USING btree (field_media_video_file_target_id);
CREATE INDEX idx_28562_revision_id ON media__field_media_video_file USING btree (revision_id);



CREATE TABLE IF NOT EXISTS media_field_data (
        mid int8 NOT NULL,
        vid int8 NOT NULL,
        bundle varchar(32) NOT NULL,
        langcode varchar(12) NOT NULL,
        status int2 NOT NULL,
        uid int8 NOT NULL,
        \"name\" varchar(255) DEFAULT NULL::character varying NULL,
        thumbnail__target_id int8 NULL,
        thumbnail__alt varchar(512) DEFAULT NULL::character varying NULL,
        thumbnail__title varchar(1024) DEFAULT NULL::character varying NULL,
        thumbnail__width int8 NULL,
        thumbnail__height int8 NULL,
        created int8 NULL,
        changed int8 NULL,
        default_langcode int2 NOT NULL,
        revision_translation_affected int2 NULL,
        CONSTRAINT idx_28429_primary PRIMARY KEY (mid, langcode)
);
CREATE INDEX idx_28429_media__id__default_langcode__langcode ON media_field_data USING btree (mid, default_langcode, langcode);
CREATE INDEX idx_28429_media__status_bundle ON media_field_data USING btree (status, bundle, mid);
CREATE INDEX idx_28429_media__vid ON media_field_data USING btree (vid);
CREATE INDEX idx_28429_media_field__bundle__target_id ON media_field_data USING btree (bundle);
CREATE INDEX idx_28429_media_field__thumbnail__target_id ON media_field_data USING btree (thumbnail__target_id);
CREATE INDEX idx_28429_media_field__uid__target_id ON media_field_data USING btree (uid);



CREATE TABLE IF NOT EXISTS media_field_revision (
        mid int8 NOT NULL,
        vid int8 NOT NULL,
        langcode varchar(12) NOT NULL,
        status int2 NOT NULL,
        uid int8 NOT NULL,
        \"name\" varchar(255) DEFAULT NULL::character varying NULL,
        thumbnail__target_id int8 NULL,
        thumbnail__alt varchar(512) DEFAULT NULL::character varying NULL,
        thumbnail__title varchar(1024) DEFAULT NULL::character varying NULL,
        thumbnail__width int8 NULL,
        thumbnail__height int8 NULL,
        created int8 NULL,
        changed int8 NULL,
        default_langcode int2 NOT NULL,
        revision_translation_affected int2 NULL,
        CONSTRAINT idx_28438_primary PRIMARY KEY (vid, langcode)
);
CREATE INDEX idx_28438_media__id__default_langcode__langcode ON media_field_revision USING btree (mid, default_langcode, langcode);
CREATE INDEX idx_28438_media_field__thumbnail__target_id ON media_field_revision USING btree (thumbnail__target_id);
CREATE INDEX idx_28438_media_field__uid__target_id ON media_field_revision USING btree (uid);



CREATE TABLE IF NOT EXISTS media_revision (
        mid int8 NOT NULL,
        vid bigserial NOT NULL,
        langcode varchar(12) NOT NULL,
        revision_user int8 NULL,
        revision_created int8 NULL,
        revision_log_message text NULL,
        revision_default int2 NULL,
        CONSTRAINT idx_28449_primary PRIMARY KEY (vid)
);
CREATE INDEX idx_28449_media__mid ON media_revision USING btree (mid);
CREATE INDEX idx_28449_media_field__revision_user__target_id ON media_revision USING btree (revision_user);



CREATE TABLE IF NOT EXISTS media_revision__field_media_audio_file (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_media_audio_file_target_id int8 NOT NULL,
        field_media_audio_file_display int2 DEFAULT '1'::smallint NULL,
        field_media_audio_file_description text NULL,
        CONSTRAINT idx_28456_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_28456_bundle ON media_revision__field_media_audio_file USING btree (bundle);
CREATE INDEX idx_28456_field_media_audio_file_target_id ON media_revision__field_media_audio_file USING btree (field_media_audio_file_target_id);
CREATE INDEX idx_28456_revision_id ON media_revision__field_media_audio_file USING btree (revision_id);



CREATE TABLE IF NOT EXISTS media_revision__field_media_document (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_media_document_target_id int8 NOT NULL,
        field_media_document_display int2 DEFAULT '1'::smallint NULL,
        field_media_document_description text NULL,
        CONSTRAINT idx_28466_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_28466_bundle ON media_revision__field_media_document USING btree (bundle);
CREATE INDEX idx_28466_field_media_document_target_id ON media_revision__field_media_document USING btree (field_media_document_target_id);
CREATE INDEX idx_28466_revision_id ON media_revision__field_media_document USING btree (revision_id);



CREATE TABLE IF NOT EXISTS media_revision__field_media_image (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_media_image_target_id int8 NOT NULL,
        field_media_image_alt varchar(512) DEFAULT NULL::character varying NULL,
        field_media_image_title varchar(1024) DEFAULT NULL::character varying NULL,
        field_media_image_width int8 NULL,
        field_media_image_height int8 NULL,
        CONSTRAINT idx_28476_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_28476_bundle ON media_revision__field_media_image USING btree (bundle);
CREATE INDEX idx_28476_field_media_image_target_id ON media_revision__field_media_image USING btree (field_media_image_target_id);
CREATE INDEX idx_28476_revision_id ON media_revision__field_media_image USING btree (revision_id);



CREATE TABLE IF NOT EXISTS media_revision__field_media_oembed_video (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_media_oembed_video_value varchar(255) NOT NULL,
        CONSTRAINT idx_28487_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_28487_bundle ON media_revision__field_media_oembed_video USING btree (bundle);
CREATE INDEX idx_28487_revision_id ON media_revision__field_media_oembed_video USING btree (revision_id);



CREATE TABLE IF NOT EXISTS media_revision__field_media_svg (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_media_svg_target_id int8 NOT NULL,
        field_media_svg_alt varchar(512) DEFAULT NULL::character varying NULL,
        field_media_svg_title varchar(1024) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_28493_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_28493_bundle ON media_revision__field_media_svg USING btree (bundle);
CREATE INDEX idx_28493_field_media_svg_target_id ON media_revision__field_media_svg USING btree (field_media_svg_target_id);
CREATE INDEX idx_28493_revision_id ON media_revision__field_media_svg USING btree (revision_id);



CREATE TABLE IF NOT EXISTS media_revision__field_media_video_file (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_media_video_file_target_id int8 NOT NULL,
        field_media_video_file_display int2 DEFAULT '1'::smallint NULL,
        field_media_video_file_description text NULL,
        CONSTRAINT idx_28504_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_28504_bundle ON media_revision__field_media_video_file USING btree (bundle);
CREATE INDEX idx_28504_field_media_video_file_target_id ON media_revision__field_media_video_file USING btree (field_media_video_file_target_id);
CREATE INDEX idx_28504_revision_id ON media_revision__field_media_video_file USING btree (revision_id);





CREATE TABLE IF NOT EXISTS migrate_map_my_wordpress_attachments (
        source_ids_hash varchar(64) NOT NULL,
        sourceid1 int8 NOT NULL,
        destid1 int8 NULL,
        source_row_status int2 DEFAULT '0'::smallint NOT NULL,
        rollback_action int2 DEFAULT '0'::smallint NOT NULL,
        last_imported numeric DEFAULT '0'::numeric NOT NULL,
        hash varchar(64) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_28641_primary PRIMARY KEY (source_ids_hash)
);
CREATE INDEX idx_28641_source ON migrate_map_my_wordpress_attachments USING btree (sourceid1);



CREATE TABLE IF NOT EXISTS migrate_map_my_wordpress_categories (
        source_ids_hash varchar(64) NOT NULL,
        sourceid1 varchar(255) NOT NULL,
        destid1 int8 NULL,
        source_row_status int2 DEFAULT '0'::smallint NOT NULL,
        rollback_action int2 DEFAULT '0'::smallint NOT NULL,
        last_imported numeric DEFAULT '0'::numeric NOT NULL,
        hash varchar(64) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_28651_primary PRIMARY KEY (source_ids_hash)
);
CREATE INDEX idx_28651_source ON migrate_map_my_wordpress_categories USING btree (sourceid1);



CREATE TABLE IF NOT EXISTS migrate_map_my_wordpress_content_post (
        source_ids_hash varchar(64) NOT NULL,
        sourceid1 int8 NOT NULL,
        destid1 int8 NULL,
        source_row_status int2 DEFAULT '0'::smallint NOT NULL,
        rollback_action int2 DEFAULT '0'::smallint NOT NULL,
        last_imported numeric DEFAULT '0'::numeric NOT NULL,
        hash varchar(64) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_28661_primary PRIMARY KEY (source_ids_hash)
);
CREATE INDEX idx_28661_source ON migrate_map_my_wordpress_content_post USING btree (sourceid1);



CREATE TABLE IF NOT EXISTS migrate_map_my_wordpress_tags (
        source_ids_hash varchar(64) NOT NULL,
        sourceid1 varchar(255) NOT NULL,
        destid1 int8 NULL,
        source_row_status int2 DEFAULT '0'::smallint NOT NULL,
        rollback_action int2 DEFAULT '0'::smallint NOT NULL,
        last_imported numeric DEFAULT '0'::numeric NOT NULL,
        hash varchar(64) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_28671_primary PRIMARY KEY (source_ids_hash)
);
CREATE INDEX idx_28671_source ON migrate_map_my_wordpress_tags USING btree (sourceid1);



CREATE TABLE IF NOT EXISTS migrate_message_my_wordpress_attachments (
        msgid bigserial NOT NULL,
        source_ids_hash varchar(64) NOT NULL,
        \"level\" int8 DEFAULT '1'::bigint NOT NULL,
        message text NOT NULL,
        CONSTRAINT idx_28683_primary PRIMARY KEY (msgid)
);
CREATE INDEX idx_28683_source_ids_hash ON migrate_message_my_wordpress_attachments USING btree (source_ids_hash);



CREATE TABLE IF NOT EXISTS migrate_message_my_wordpress_categories (
        msgid bigserial NOT NULL,
        source_ids_hash varchar(64) NOT NULL,
        \"level\" int8 DEFAULT '1'::bigint NOT NULL,
        message text NOT NULL,
        CONSTRAINT idx_28693_primary PRIMARY KEY (msgid)
);
CREATE INDEX idx_28693_source_ids_hash ON migrate_message_my_wordpress_categories USING btree (source_ids_hash);



CREATE TABLE IF NOT EXISTS migrate_message_my_wordpress_content_post (
        msgid bigserial NOT NULL,
        source_ids_hash varchar(64) NOT NULL,
        \"level\" int8 DEFAULT '1'::bigint NOT NULL,
        message text NOT NULL,
        CONSTRAINT idx_28703_primary PRIMARY KEY (msgid)
);
CREATE INDEX idx_28703_source_ids_hash ON migrate_message_my_wordpress_content_post USING btree (source_ids_hash);



CREATE TABLE IF NOT EXISTS migrate_message_my_wordpress_tags (
        msgid bigserial NOT NULL,
        source_ids_hash varchar(64) NOT NULL,
        \"level\" int8 DEFAULT '1'::bigint NOT NULL,
        message text NOT NULL,
        CONSTRAINT idx_28713_primary PRIMARY KEY (msgid)
);
CREATE INDEX idx_28713_source_ids_hash ON migrate_message_my_wordpress_tags USING btree (source_ids_hash);





CREATE TABLE IF NOT EXISTS node__field_categoria (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_categoria_target_id int8 NOT NULL,
        CONSTRAINT idx_28854_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_28854_bundle ON node__field_categoria USING btree (bundle);
CREATE INDEX idx_28854_field_categoria_target_id ON node__field_categoria USING btree (field_categoria_target_id);
CREATE INDEX idx_28854_revision_id ON node__field_categoria USING btree (revision_id);



CREATE TABLE IF NOT EXISTS node__field_conteudo (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_conteudo_target_id int8 NOT NULL,
        field_conteudo_target_revision_id int8 NOT NULL,
        CONSTRAINT idx_28860_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_28860_bundle ON node__field_conteudo USING btree (bundle);
CREATE INDEX idx_28860_field_conteudo_target_id ON node__field_conteudo USING btree (field_conteudo_target_id);
CREATE INDEX idx_28860_field_conteudo_target_revision_id ON node__field_conteudo USING btree (field_conteudo_target_revision_id);
CREATE INDEX idx_28860_revision_id ON node__field_conteudo USING btree (revision_id);





CREATE TABLE IF NOT EXISTS node__field_thumbnail (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_thumbnail_target_id int8 NOT NULL,
        field_thumbnail_alt varchar(512) DEFAULT NULL::character varying NULL,
        field_thumbnail_title varchar(1024) DEFAULT NULL::character varying NULL,
        field_thumbnail_width int8 NULL,
        field_thumbnail_height int8 NULL,
        CONSTRAINT idx_28883_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_28883_bundle ON node__field_thumbnail USING btree (bundle);
CREATE INDEX idx_28883_field_thumbnail_target_id ON node__field_thumbnail USING btree (field_thumbnail_target_id);
CREATE INDEX idx_28883_revision_id ON node__field_thumbnail USING btree (revision_id);



CREATE TABLE IF NOT EXISTS node__field_title (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_title_value text NOT NULL,
        field_title_format varchar(255) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_28894_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_28894_bundle ON node__field_title USING btree (bundle);
CREATE INDEX idx_28894_field_title_format ON node__field_title USING btree (field_title_format);
CREATE INDEX idx_28894_revision_id ON node__field_title USING btree (revision_id);



CREATE TABLE IF NOT EXISTS node__field_url (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_url_value varchar(255) NOT NULL,
        CONSTRAINT idx_28904_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_28904_bundle ON node__field_url USING btree (bundle);
CREATE INDEX idx_28904_revision_id ON node__field_url USING btree (revision_id);



CREATE TABLE IF NOT EXISTS node__field_video (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_video_target_id int8 NOT NULL,
        field_video_display int2 DEFAULT '1'::smallint NULL,
        field_video_description text NULL,
        CONSTRAINT idx_28910_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_28910_bundle ON node__field_video USING btree (bundle);
CREATE INDEX idx_28910_field_video_target_id ON node__field_video USING btree (field_video_target_id);
CREATE INDEX idx_28910_revision_id ON node__field_video USING btree (revision_id);





CREATE TABLE IF NOT EXISTS node_revision__field_categoria (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_categoria_target_id int8 NOT NULL,
        CONSTRAINT idx_28771_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_28771_bundle ON node_revision__field_categoria USING btree (bundle);
CREATE INDEX idx_28771_field_categoria_target_id ON node_revision__field_categoria USING btree (field_categoria_target_id);
CREATE INDEX idx_28771_revision_id ON node_revision__field_categoria USING btree (revision_id);



CREATE TABLE IF NOT EXISTS node_revision__field_conteudo (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_conteudo_target_id int8 NOT NULL,
        field_conteudo_target_revision_id int8 NOT NULL,
        CONSTRAINT idx_28777_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_28777_bundle ON node_revision__field_conteudo USING btree (bundle);
CREATE INDEX idx_28777_field_conteudo_target_id ON node_revision__field_conteudo USING btree (field_conteudo_target_id);
CREATE INDEX idx_28777_field_conteudo_target_revision_id ON node_revision__field_conteudo USING btree (field_conteudo_target_revision_id);
CREATE INDEX idx_28777_revision_id ON node_revision__field_conteudo USING btree (revision_id);






CREATE TABLE IF NOT EXISTS node_revision__field_thumbnail (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_thumbnail_target_id int8 NOT NULL,
        field_thumbnail_alt varchar(512) DEFAULT NULL::character varying NULL,
        field_thumbnail_title varchar(1024) DEFAULT NULL::character varying NULL,
        field_thumbnail_width int8 NULL,
        field_thumbnail_height int8 NULL,
        CONSTRAINT idx_28800_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_28800_bundle ON node_revision__field_thumbnail USING btree (bundle);
CREATE INDEX idx_28800_field_thumbnail_target_id ON node_revision__field_thumbnail USING btree (field_thumbnail_target_id);
CREATE INDEX idx_28800_revision_id ON node_revision__field_thumbnail USING btree (revision_id);



CREATE TABLE IF NOT EXISTS node_revision__field_title (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_title_value text NOT NULL,
        field_title_format varchar(255) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_28811_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_28811_bundle ON node_revision__field_title USING btree (bundle);
CREATE INDEX idx_28811_field_title_format ON node_revision__field_title USING btree (field_title_format);
CREATE INDEX idx_28811_revision_id ON node_revision__field_title USING btree (revision_id);



CREATE TABLE IF NOT EXISTS node_revision__field_url (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_url_value varchar(255) NOT NULL,
        CONSTRAINT idx_28821_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_28821_bundle ON node_revision__field_url USING btree (bundle);
CREATE INDEX idx_28821_revision_id ON node_revision__field_url USING btree (revision_id);



CREATE TABLE IF NOT EXISTS node_revision__field_video (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_video_target_id int8 NOT NULL,
        field_video_display int2 DEFAULT '1'::smallint NULL,
        field_video_description text NULL,
        CONSTRAINT idx_28827_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_28827_bundle ON node_revision__field_video USING btree (bundle);
CREATE INDEX idx_28827_field_video_target_id ON node_revision__field_video USING btree (field_video_target_id);
CREATE INDEX idx_28827_revision_id ON node_revision__field_video USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_body (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_body_value text NOT NULL,
        field_body_format varchar(255) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_29186_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29186_bundle ON paragraph__field_body USING btree (bundle);
CREATE INDEX idx_29186_field_body_format ON paragraph__field_body USING btree (field_body_format);
CREATE INDEX idx_29186_revision_id ON paragraph__field_body USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_card (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_card_target_id int8 NOT NULL,
        field_card_target_revision_id int8 NOT NULL,
        CONSTRAINT idx_29196_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29196_bundle ON paragraph__field_card USING btree (bundle);
CREATE INDEX idx_29196_field_card_target_id ON paragraph__field_card USING btree (field_card_target_id);
CREATE INDEX idx_29196_field_card_target_revision_id ON paragraph__field_card USING btree (field_card_target_revision_id);
CREATE INDEX idx_29196_revision_id ON paragraph__field_card USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_content_type (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_content_type_value varchar(255) NOT NULL,
        CONSTRAINT idx_29202_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29202_bundle ON paragraph__field_content_type USING btree (bundle);
CREATE INDEX idx_29202_field_content_type_value ON paragraph__field_content_type USING btree (field_content_type_value);
CREATE INDEX idx_29202_revision_id ON paragraph__field_content_type USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_conteudo_texto_curto (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_conteudo_texto_curto_target_id int8 NOT NULL,
        field_conteudo_texto_curto_target_revision_id int8 NOT NULL,
        CONSTRAINT idx_29208_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29208_bundle ON paragraph__field_conteudo_texto_curto USING btree (bundle);
CREATE INDEX idx_29208_field_conteudo_texto_curto_target_id ON paragraph__field_conteudo_texto_curto USING btree (field_conteudo_texto_curto_target_id);
CREATE INDEX idx_29208_field_conteudo_texto_curto_target_revision_id ON paragraph__field_conteudo_texto_curto USING btree (field_conteudo_texto_curto_target_revision_id);
CREATE INDEX idx_29208_revision_id ON paragraph__field_conteudo_texto_curto USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_csv (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_csv_target_id int8 NOT NULL,
        field_csv_display int2 DEFAULT '1'::smallint NULL,
        field_csv_description text NULL,
        field_csv_settings text NULL,
        CONSTRAINT idx_29214_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29214_bundle ON paragraph__field_csv USING btree (bundle);
CREATE INDEX idx_29214_field_csv_target_id ON paragraph__field_csv USING btree (field_csv_target_id);
CREATE INDEX idx_29214_revision_id ON paragraph__field_csv USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_cta_label (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_cta_label_value varchar(255) NOT NULL,
        CONSTRAINT idx_29224_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29224_bundle ON paragraph__field_cta_label USING btree (bundle);
CREATE INDEX idx_29224_revision_id ON paragraph__field_cta_label USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_cta_url (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_cta_url_value varchar(255) NOT NULL,
        CONSTRAINT idx_29230_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29230_bundle ON paragraph__field_cta_url USING btree (bundle);
CREATE INDEX idx_29230_revision_id ON paragraph__field_cta_url USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_detail_color (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_detail_color_color_pickr varchar(256) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_29236_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29236_bundle ON paragraph__field_detail_color USING btree (bundle);
CREATE INDEX idx_29236_revision_id ON paragraph__field_detail_color USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_detail_position (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_detail_position_value varchar(255) NOT NULL,
        CONSTRAINT idx_29243_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29243_bundle ON paragraph__field_detail_position USING btree (bundle);
CREATE INDEX idx_29243_field_detail_position_value ON paragraph__field_detail_position USING btree (field_detail_position_value);
CREATE INDEX idx_29243_revision_id ON paragraph__field_detail_position USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_enable_filter (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_enable_filter_value int2 NOT NULL,
        CONSTRAINT idx_29249_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29249_bundle ON paragraph__field_enable_filter USING btree (bundle);
CREATE INDEX idx_29249_revision_id ON paragraph__field_enable_filter USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_enable_numbers (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_enable_numbers_value int2 NOT NULL,
        CONSTRAINT idx_29255_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29255_bundle ON paragraph__field_enable_numbers USING btree (bundle);
CREATE INDEX idx_29255_revision_id ON paragraph__field_enable_numbers USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_field_items_per_page (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_field_items_per_page_value varchar(255) NOT NULL,
        CONSTRAINT idx_29261_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29261_bundle ON paragraph__field_field_items_per_page USING btree (bundle);
CREATE INDEX idx_29261_revision_id ON paragraph__field_field_items_per_page USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_filter_key (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_filter_key_value varchar(255) NOT NULL,
        CONSTRAINT idx_29267_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29267_bundle ON paragraph__field_filter_key USING btree (bundle);
CREATE INDEX idx_29267_revision_id ON paragraph__field_filter_key USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_galeria (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_galeria_target_id int8 NOT NULL,
        field_galeria_target_revision_id int8 NOT NULL,
        CONSTRAINT idx_29273_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29273_bundle ON paragraph__field_galeria USING btree (bundle);
CREATE INDEX idx_29273_field_galeria_target_id ON paragraph__field_galeria USING btree (field_galeria_target_id);
CREATE INDEX idx_29273_field_galeria_target_revision_id ON paragraph__field_galeria USING btree (field_galeria_target_revision_id);
CREATE INDEX idx_29273_revision_id ON paragraph__field_galeria USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_icone (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_icone_target_id int8 NOT NULL,
        field_icone_alt varchar(512) DEFAULT NULL::character varying NULL,
        field_icone_title varchar(1024) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_29279_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29279_bundle ON paragraph__field_icone USING btree (bundle);
CREATE INDEX idx_29279_field_icone_target_id ON paragraph__field_icone USING btree (field_icone_target_id);
CREATE INDEX idx_29279_revision_id ON paragraph__field_icone USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_imagem (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_imagem_target_id int8 NOT NULL,
        field_imagem_alt varchar(512) DEFAULT NULL::character varying NULL,
        field_imagem_title varchar(1024) DEFAULT NULL::character varying NULL,
        field_imagem_width int8 NULL,
        field_imagem_height int8 NULL,
        CONSTRAINT idx_29290_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29290_bundle ON paragraph__field_imagem USING btree (bundle);
CREATE INDEX idx_29290_field_imagem_target_id ON paragraph__field_imagem USING btree (field_imagem_target_id);
CREATE INDEX idx_29290_revision_id ON paragraph__field_imagem USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_key (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_key_value text NOT NULL,
        CONSTRAINT idx_29301_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29301_bundle ON paragraph__field_key USING btree (bundle);
CREATE INDEX idx_29301_revision_id ON paragraph__field_key USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_key_label (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_key_label_value varchar(255) NOT NULL,
        CONSTRAINT idx_29310_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29310_bundle ON paragraph__field_key_label USING btree (bundle);
CREATE INDEX idx_29310_revision_id ON paragraph__field_key_label USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_layout (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_layout_value varchar(255) NOT NULL,
        CONSTRAINT idx_29316_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29316_bundle ON paragraph__field_layout USING btree (bundle);
CREATE INDEX idx_29316_field_layout_value ON paragraph__field_layout USING btree (field_layout_value);
CREATE INDEX idx_29316_revision_id ON paragraph__field_layout USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_layout_intro (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_layout_intro_value varchar(255) NOT NULL,
        CONSTRAINT idx_29322_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29322_bundle ON paragraph__field_layout_intro USING btree (bundle);
CREATE INDEX idx_29322_field_layout_intro_value ON paragraph__field_layout_intro USING btree (field_layout_intro_value);
CREATE INDEX idx_29322_revision_id ON paragraph__field_layout_intro USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_layout_intro_list (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_layout_intro_list_value varchar(255) NOT NULL,
        CONSTRAINT idx_29328_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29328_bundle ON paragraph__field_layout_intro_list USING btree (bundle);
CREATE INDEX idx_29328_field_layout_intro_list_value ON paragraph__field_layout_intro_list USING btree (field_layout_intro_list_value);
CREATE INDEX idx_29328_revision_id ON paragraph__field_layout_intro_list USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_layout_texto_enumerado (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_layout_texto_enumerado_value varchar(255) NOT NULL,
        CONSTRAINT idx_29334_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29334_bundle ON paragraph__field_layout_texto_enumerado USING btree (bundle);
CREATE INDEX idx_29334_field_layout_texto_enumerado_value ON paragraph__field_layout_texto_enumerado USING btree (field_layout_texto_enumerado_value);
CREATE INDEX idx_29334_revision_id ON paragraph__field_layout_texto_enumerado USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_link (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_link_value varchar(255) NOT NULL,
        CONSTRAINT idx_29340_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29340_bundle ON paragraph__field_link USING btree (bundle);
CREATE INDEX idx_29340_revision_id ON paragraph__field_link USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_list_item (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_list_item_target_id int8 NOT NULL,
        field_list_item_target_revision_id int8 NOT NULL,
        CONSTRAINT idx_29346_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29346_bundle ON paragraph__field_list_item USING btree (bundle);
CREATE INDEX idx_29346_field_list_item_target_id ON paragraph__field_list_item USING btree (field_list_item_target_id);
CREATE INDEX idx_29346_field_list_item_target_revision_id ON paragraph__field_list_item USING btree (field_list_item_target_revision_id);
CREATE INDEX idx_29346_revision_id ON paragraph__field_list_item USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_mask_enabled (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_mask_enabled_value int2 NOT NULL,
        CONSTRAINT idx_29352_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29352_bundle ON paragraph__field_mask_enabled USING btree (bundle);
CREATE INDEX idx_29352_revision_id ON paragraph__field_mask_enabled USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_no_background (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_no_background_value int2 NOT NULL,
        CONSTRAINT idx_29358_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29358_bundle ON paragraph__field_no_background USING btree (bundle);
CREATE INDEX idx_29358_revision_id ON paragraph__field_no_background USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_subtitulo (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_subtitulo_value text NOT NULL,
        field_subtitulo_format varchar(255) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_29364_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29364_bundle ON paragraph__field_subtitulo USING btree (bundle);
CREATE INDEX idx_29364_field_subtitulo_format ON paragraph__field_subtitulo USING btree (field_subtitulo_format);
CREATE INDEX idx_29364_revision_id ON paragraph__field_subtitulo USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_texto (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_texto_value text NOT NULL,
        field_texto_format varchar(255) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_29374_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29374_bundle ON paragraph__field_texto USING btree (bundle);
CREATE INDEX idx_29374_field_texto_format ON paragraph__field_texto USING btree (field_texto_format);
CREATE INDEX idx_29374_revision_id ON paragraph__field_texto USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_texto_curto (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_texto_curto_value text NOT NULL,
        field_texto_curto_summary text NULL,
        field_texto_curto_format varchar(255) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_29384_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29384_bundle ON paragraph__field_texto_curto USING btree (bundle);
CREATE INDEX idx_29384_field_texto_curto_format ON paragraph__field_texto_curto USING btree (field_texto_curto_format);
CREATE INDEX idx_29384_revision_id ON paragraph__field_texto_curto USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_title (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_title_value text NOT NULL,
        field_title_format varchar(255) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_29394_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29394_bundle ON paragraph__field_title USING btree (bundle);
CREATE INDEX idx_29394_field_title_format ON paragraph__field_title USING btree (field_title_format);
CREATE INDEX idx_29394_revision_id ON paragraph__field_title USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_titulo (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_titulo_value varchar(255) NOT NULL,
        CONSTRAINT idx_29404_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29404_bundle ON paragraph__field_titulo USING btree (bundle);
CREATE INDEX idx_29404_revision_id ON paragraph__field_titulo USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_video_title (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_video_title_value varchar(255) NOT NULL,
        CONSTRAINT idx_29410_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29410_bundle ON paragraph__field_video_title USING btree (bundle);
CREATE INDEX idx_29410_revision_id ON paragraph__field_video_title USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph__field_video_url (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_video_url_value varchar(255) NOT NULL,
        CONSTRAINT idx_29416_primary PRIMARY KEY (entity_id, deleted, delta, langcode)
);
CREATE INDEX idx_29416_bundle ON paragraph__field_video_url USING btree (bundle);
CREATE INDEX idx_29416_revision_id ON paragraph__field_video_url USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_body (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_body_value text NOT NULL,
        field_body_format varchar(255) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_28950_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_28950_bundle ON paragraph_revision__field_body USING btree (bundle);
CREATE INDEX idx_28950_field_body_format ON paragraph_revision__field_body USING btree (field_body_format);
CREATE INDEX idx_28950_revision_id ON paragraph_revision__field_body USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_card (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_card_target_id int8 NOT NULL,
        field_card_target_revision_id int8 NOT NULL,
        CONSTRAINT idx_28960_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_28960_bundle ON paragraph_revision__field_card USING btree (bundle);
CREATE INDEX idx_28960_field_card_target_id ON paragraph_revision__field_card USING btree (field_card_target_id);
CREATE INDEX idx_28960_field_card_target_revision_id ON paragraph_revision__field_card USING btree (field_card_target_revision_id);
CREATE INDEX idx_28960_revision_id ON paragraph_revision__field_card USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_content_type (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_content_type_value varchar(255) NOT NULL,
        CONSTRAINT idx_28966_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_28966_bundle ON paragraph_revision__field_content_type USING btree (bundle);
CREATE INDEX idx_28966_field_content_type_value ON paragraph_revision__field_content_type USING btree (field_content_type_value);
CREATE INDEX idx_28966_revision_id ON paragraph_revision__field_content_type USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_conteudo_texto_curto (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_conteudo_texto_curto_target_id int8 NOT NULL,
        field_conteudo_texto_curto_target_revision_id int8 NOT NULL,
        CONSTRAINT idx_28972_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_28972_bundle ON paragraph_revision__field_conteudo_texto_curto USING btree (bundle);
CREATE INDEX idx_28972_field_conteudo_texto_curto_target_id ON paragraph_revision__field_conteudo_texto_curto USING btree (field_conteudo_texto_curto_target_id);
CREATE INDEX idx_28972_field_conteudo_texto_curto_target_revision_id ON paragraph_revision__field_conteudo_texto_curto USING btree (field_conteudo_texto_curto_target_revision_id);
CREATE INDEX idx_28972_revision_id ON paragraph_revision__field_conteudo_texto_curto USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_csv (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_csv_target_id int8 NOT NULL,
        field_csv_display int2 DEFAULT '1'::smallint NULL,
        field_csv_description text NULL,
        field_csv_settings text NULL,
        CONSTRAINT idx_28978_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_28978_bundle ON paragraph_revision__field_csv USING btree (bundle);
CREATE INDEX idx_28978_field_csv_target_id ON paragraph_revision__field_csv USING btree (field_csv_target_id);
CREATE INDEX idx_28978_revision_id ON paragraph_revision__field_csv USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_cta_label (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_cta_label_value varchar(255) NOT NULL,
        CONSTRAINT idx_28988_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_28988_bundle ON paragraph_revision__field_cta_label USING btree (bundle);
CREATE INDEX idx_28988_revision_id ON paragraph_revision__field_cta_label USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_cta_url (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_cta_url_value varchar(255) NOT NULL,
        CONSTRAINT idx_28994_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_28994_bundle ON paragraph_revision__field_cta_url USING btree (bundle);
CREATE INDEX idx_28994_revision_id ON paragraph_revision__field_cta_url USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_detail_color (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_detail_color_color_pickr varchar(256) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_29000_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29000_bundle ON paragraph_revision__field_detail_color USING btree (bundle);
CREATE INDEX idx_29000_revision_id ON paragraph_revision__field_detail_color USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_detail_position (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_detail_position_value varchar(255) NOT NULL,
        CONSTRAINT idx_29007_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29007_bundle ON paragraph_revision__field_detail_position USING btree (bundle);
CREATE INDEX idx_29007_field_detail_position_value ON paragraph_revision__field_detail_position USING btree (field_detail_position_value);
CREATE INDEX idx_29007_revision_id ON paragraph_revision__field_detail_position USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_enable_filter (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_enable_filter_value int2 NOT NULL,
        CONSTRAINT idx_29013_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29013_bundle ON paragraph_revision__field_enable_filter USING btree (bundle);
CREATE INDEX idx_29013_revision_id ON paragraph_revision__field_enable_filter USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_enable_numbers (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_enable_numbers_value int2 NOT NULL,
        CONSTRAINT idx_29019_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29019_bundle ON paragraph_revision__field_enable_numbers USING btree (bundle);
CREATE INDEX idx_29019_revision_id ON paragraph_revision__field_enable_numbers USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_field_items_per_page (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_field_items_per_page_value varchar(255) NOT NULL,
        CONSTRAINT idx_29025_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29025_bundle ON paragraph_revision__field_field_items_per_page USING btree (bundle);
CREATE INDEX idx_29025_revision_id ON paragraph_revision__field_field_items_per_page USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_filter_key (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_filter_key_value varchar(255) NOT NULL,
        CONSTRAINT idx_29031_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29031_bundle ON paragraph_revision__field_filter_key USING btree (bundle);
CREATE INDEX idx_29031_revision_id ON paragraph_revision__field_filter_key USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_galeria (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_galeria_target_id int8 NOT NULL,
        field_galeria_target_revision_id int8 NOT NULL,
        CONSTRAINT idx_29037_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29037_bundle ON paragraph_revision__field_galeria USING btree (bundle);
CREATE INDEX idx_29037_field_galeria_target_id ON paragraph_revision__field_galeria USING btree (field_galeria_target_id);
CREATE INDEX idx_29037_field_galeria_target_revision_id ON paragraph_revision__field_galeria USING btree (field_galeria_target_revision_id);
CREATE INDEX idx_29037_revision_id ON paragraph_revision__field_galeria USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_icone (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_icone_target_id int8 NOT NULL,
        field_icone_alt varchar(512) DEFAULT NULL::character varying NULL,
        field_icone_title varchar(1024) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_29043_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29043_bundle ON paragraph_revision__field_icone USING btree (bundle);
CREATE INDEX idx_29043_field_icone_target_id ON paragraph_revision__field_icone USING btree (field_icone_target_id);
CREATE INDEX idx_29043_revision_id ON paragraph_revision__field_icone USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_imagem (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_imagem_target_id int8 NOT NULL,
        field_imagem_alt varchar(512) DEFAULT NULL::character varying NULL,
        field_imagem_title varchar(1024) DEFAULT NULL::character varying NULL,
        field_imagem_width int8 NULL,
        field_imagem_height int8 NULL,
        CONSTRAINT idx_29054_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29054_bundle ON paragraph_revision__field_imagem USING btree (bundle);
CREATE INDEX idx_29054_field_imagem_target_id ON paragraph_revision__field_imagem USING btree (field_imagem_target_id);
CREATE INDEX idx_29054_revision_id ON paragraph_revision__field_imagem USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_key (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_key_value text NOT NULL,
        CONSTRAINT idx_29065_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29065_bundle ON paragraph_revision__field_key USING btree (bundle);
CREATE INDEX idx_29065_revision_id ON paragraph_revision__field_key USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_key_label (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_key_label_value varchar(255) NOT NULL,
        CONSTRAINT idx_29074_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29074_bundle ON paragraph_revision__field_key_label USING btree (bundle);
CREATE INDEX idx_29074_revision_id ON paragraph_revision__field_key_label USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_layout (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_layout_value varchar(255) NOT NULL,
        CONSTRAINT idx_29080_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29080_bundle ON paragraph_revision__field_layout USING btree (bundle);
CREATE INDEX idx_29080_field_layout_value ON paragraph_revision__field_layout USING btree (field_layout_value);
CREATE INDEX idx_29080_revision_id ON paragraph_revision__field_layout USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_layout_intro (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_layout_intro_value varchar(255) NOT NULL,
        CONSTRAINT idx_29086_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29086_bundle ON paragraph_revision__field_layout_intro USING btree (bundle);
CREATE INDEX idx_29086_field_layout_intro_value ON paragraph_revision__field_layout_intro USING btree (field_layout_intro_value);
CREATE INDEX idx_29086_revision_id ON paragraph_revision__field_layout_intro USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_layout_intro_list (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_layout_intro_list_value varchar(255) NOT NULL,
        CONSTRAINT idx_29092_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29092_bundle ON paragraph_revision__field_layout_intro_list USING btree (bundle);
CREATE INDEX idx_29092_field_layout_intro_list_value ON paragraph_revision__field_layout_intro_list USING btree (field_layout_intro_list_value);
CREATE INDEX idx_29092_revision_id ON paragraph_revision__field_layout_intro_list USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_layout_texto_enumerado (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_layout_texto_enumerado_value varchar(255) NOT NULL,
        CONSTRAINT idx_29098_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29098_bundle ON paragraph_revision__field_layout_texto_enumerado USING btree (bundle);
CREATE INDEX idx_29098_field_layout_texto_enumerado_value ON paragraph_revision__field_layout_texto_enumerado USING btree (field_layout_texto_enumerado_value);
CREATE INDEX idx_29098_revision_id ON paragraph_revision__field_layout_texto_enumerado USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_link (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_link_value varchar(255) NOT NULL,
        CONSTRAINT idx_29104_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29104_bundle ON paragraph_revision__field_link USING btree (bundle);
CREATE INDEX idx_29104_revision_id ON paragraph_revision__field_link USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_list_item (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_list_item_target_id int8 NOT NULL,
        field_list_item_target_revision_id int8 NOT NULL,
        CONSTRAINT idx_29110_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29110_bundle ON paragraph_revision__field_list_item USING btree (bundle);
CREATE INDEX idx_29110_field_list_item_target_id ON paragraph_revision__field_list_item USING btree (field_list_item_target_id);
CREATE INDEX idx_29110_field_list_item_target_revision_id ON paragraph_revision__field_list_item USING btree (field_list_item_target_revision_id);
CREATE INDEX idx_29110_revision_id ON paragraph_revision__field_list_item USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_mask_enabled (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_mask_enabled_value int2 NOT NULL,
        CONSTRAINT idx_29116_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29116_bundle ON paragraph_revision__field_mask_enabled USING btree (bundle);
CREATE INDEX idx_29116_revision_id ON paragraph_revision__field_mask_enabled USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_no_background (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_no_background_value int2 NOT NULL,
        CONSTRAINT idx_29122_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29122_bundle ON paragraph_revision__field_no_background USING btree (bundle);
CREATE INDEX idx_29122_revision_id ON paragraph_revision__field_no_background USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_subtitulo (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_subtitulo_value text NOT NULL,
        field_subtitulo_format varchar(255) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_29128_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29128_bundle ON paragraph_revision__field_subtitulo USING btree (bundle);
CREATE INDEX idx_29128_field_subtitulo_format ON paragraph_revision__field_subtitulo USING btree (field_subtitulo_format);
CREATE INDEX idx_29128_revision_id ON paragraph_revision__field_subtitulo USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_texto (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_texto_value text NOT NULL,
        field_texto_format varchar(255) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_29138_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29138_bundle ON paragraph_revision__field_texto USING btree (bundle);
CREATE INDEX idx_29138_field_texto_format ON paragraph_revision__field_texto USING btree (field_texto_format);
CREATE INDEX idx_29138_revision_id ON paragraph_revision__field_texto USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_texto_curto (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_texto_curto_value text NOT NULL,
        field_texto_curto_summary text NULL,
        field_texto_curto_format varchar(255) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_29148_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29148_bundle ON paragraph_revision__field_texto_curto USING btree (bundle);
CREATE INDEX idx_29148_field_texto_curto_format ON paragraph_revision__field_texto_curto USING btree (field_texto_curto_format);
CREATE INDEX idx_29148_revision_id ON paragraph_revision__field_texto_curto USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_title (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_title_value text NOT NULL,
        field_title_format varchar(255) DEFAULT NULL::character varying NULL,
        CONSTRAINT idx_29158_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29158_bundle ON paragraph_revision__field_title USING btree (bundle);
CREATE INDEX idx_29158_field_title_format ON paragraph_revision__field_title USING btree (field_title_format);
CREATE INDEX idx_29158_revision_id ON paragraph_revision__field_title USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_titulo (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_titulo_value varchar(255) NOT NULL,
        CONSTRAINT idx_29168_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29168_bundle ON paragraph_revision__field_titulo USING btree (bundle);
CREATE INDEX idx_29168_revision_id ON paragraph_revision__field_titulo USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_video_title (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_video_title_value varchar(255) NOT NULL,
        CONSTRAINT idx_29174_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29174_bundle ON paragraph_revision__field_video_title USING btree (bundle);
CREATE INDEX idx_29174_revision_id ON paragraph_revision__field_video_title USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraph_revision__field_video_url (
        bundle varchar(128) DEFAULT ''::character varying NOT NULL,
        deleted int2 DEFAULT '0'::smallint NOT NULL,
        entity_id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(32) DEFAULT ''::character varying NOT NULL,
        delta int8 NOT NULL,
        field_video_url_value varchar(255) NOT NULL,
        CONSTRAINT idx_29180_primary PRIMARY KEY (entity_id, revision_id, deleted, delta, langcode)
);
CREATE INDEX idx_29180_bundle ON paragraph_revision__field_video_url USING btree (bundle);
CREATE INDEX idx_29180_revision_id ON paragraph_revision__field_video_url USING btree (revision_id);



CREATE TABLE IF NOT EXISTS paragraphs_item (
        id bigserial NOT NULL,
        revision_id int8 NULL,
        \"type\" varchar(32) NOT NULL,
        \"uuid\" varchar(128) NOT NULL,
        langcode varchar(12) NOT NULL,
        CONSTRAINT idx_28922_primary PRIMARY KEY (id)
);
CREATE UNIQUE INDEX idx_28922_paragraph__revision_id ON paragraphs_item USING btree (revision_id);
CREATE INDEX idx_28922_paragraph_field__type__target_id ON paragraphs_item USING btree (type);
CREATE UNIQUE INDEX idx_28922_paragraph_field__uuid__value ON paragraphs_item USING btree (uuid);



CREATE TABLE IF NOT EXISTS paragraphs_item_field_data (
        id int8 NOT NULL,
        revision_id int8 NOT NULL,
        \"type\" varchar(32) NOT NULL,
        langcode varchar(12) NOT NULL,
        status int2 NOT NULL,
        created int8 NULL,
        parent_id varchar(255) DEFAULT NULL::character varying NULL,
        parent_type varchar(32) DEFAULT NULL::character varying NULL,
        parent_field_name varchar(32) DEFAULT NULL::character varying NULL,
        behavior_settings text NULL,
        default_langcode int2 NOT NULL,
        revision_translation_affected int2 NULL,
        CONSTRAINT idx_28926_primary PRIMARY KEY (id, langcode)
);
CREATE INDEX idx_28926_paragraph__id__default_langcode__langcode ON paragraphs_item_field_data USING btree (id, default_langcode, langcode);
CREATE INDEX idx_28926_paragraph__revision_id ON paragraphs_item_field_data USING btree (revision_id);
CREATE INDEX idx_28926_paragraph__status_type ON paragraphs_item_field_data USING btree (status, type, id);
CREATE INDEX idx_28926_paragraph_field__type__target_id ON paragraphs_item_field_data USING btree (type);
CREATE INDEX idx_28926_paragraphs__parent_fields ON paragraphs_item_field_data USING btree (parent_type, parent_id, parent_field_name);



CREATE TABLE IF NOT EXISTS paragraphs_item_revision (
        id int8 NOT NULL,
        revision_id bigserial NOT NULL,
        langcode varchar(12) NOT NULL,
        revision_default int2 NULL,
        CONSTRAINT idx_28937_primary PRIMARY KEY (revision_id)
);
CREATE INDEX idx_28937_paragraph__id ON paragraphs_item_revision USING btree (id);



CREATE TABLE IF NOT EXISTS paragraphs_item_revision_field_data (
        id int8 NOT NULL,
        revision_id int8 NOT NULL,
        langcode varchar(12) NOT NULL,
        status int2 NOT NULL,
        created int8 NULL,
        parent_id varchar(255) DEFAULT NULL::character varying NULL,
        parent_type varchar(32) DEFAULT NULL::character varying NULL,
        parent_field_name varchar(32) DEFAULT NULL::character varying NULL,
        behavior_settings text NULL,
        default_langcode int2 NOT NULL,
        revision_translation_affected int2 NULL,
        CONSTRAINT idx_28941_primary PRIMARY KEY (revision_id, langcode)
);
CREATE INDEX idx_28941_paragraph__id__default_langcode__langcode ON paragraphs_item_revision_field_data USING btree (id, default_langcode, langcode);
CREATE INDEX idx_28941_paragraphs__parent_fields ON paragraphs_item_revision_field_data USING btree (parent_type, parent_id, parent_field_name);






CREATE TABLE IF NOT EXISTS semaphore (
        \"name\" varchar(255) DEFAULT ''::character varying NOT NULL,
        value varchar(255) DEFAULT ''::character varying NOT NULL,
        expire float8 NOT NULL,
        CONSTRAINT idx_29486_primary PRIMARY KEY (name)
);
CREATE INDEX idx_29486_expire ON semaphore USING btree (expire);
CREATE INDEX idx_29486_value ON semaphore USING btree (value);






CREATE TABLE IF NOT EXISTS views_url_alias (
        entity_type varchar(32) DEFAULT 'node'::character varying NOT NULL,
        entity_id int8 DEFAULT '0'::bigint NOT NULL,
        langcode varchar(12) DEFAULT ''::character varying NOT NULL,
        alias varchar(255) DEFAULT ''::character varying NOT NULL
);





CREATE TABLE IF NOT EXISTS webform (
        webform_id varchar(32) NOT NULL,
        next_serial int8 DEFAULT '1'::bigint NOT NULL,
        CONSTRAINT idx_29644_primary PRIMARY KEY (webform_id, next_serial)
);



CREATE TABLE IF NOT EXISTS webform_submission (
        sid bigserial NOT NULL,
        webform_id varchar(32) NOT NULL,
        \"uuid\" varchar(128) NOT NULL,
        langcode varchar(12) NOT NULL,
        serial int8 NULL,
        \"token\" varchar(255) DEFAULT NULL::character varying NULL,
        uri varchar(2000) DEFAULT NULL::character varying NULL,
        created int8 NULL,
        completed int8 NULL,
        changed int8 NULL,
        in_draft int2 NULL,
        current_page varchar(128) DEFAULT NULL::character varying NULL,
        remote_addr varchar(128) DEFAULT NULL::character varying NULL,
        uid int8 NULL,
        entity_type varchar(32) DEFAULT NULL::character varying NULL,
        entity_id varchar(255) DEFAULT NULL::character varying NULL,
        \"locked\" int2 NULL,
        sticky int2 NULL,
        notes text NULL,
        CONSTRAINT idx_29650_primary PRIMARY KEY (sid)
);
CREATE INDEX idx_29650_webform_submission_field__token ON webform_submission USING btree (token);
CREATE INDEX idx_29650_webform_submission_field__uid__target_id ON webform_submission USING btree (uid);
CREATE UNIQUE INDEX idx_29650_webform_submission_field__uuid__value ON webform_submission USING btree (uuid);
CREATE INDEX idx_29650_webform_submission_field__webform_id__target_id ON webform_submission USING btree (webform_id);



CREATE TABLE IF NOT EXISTS webform_submission_data (
        webform_id varchar(32) NOT NULL,
        sid int8 NOT NULL,
        \"name\" varchar(128) NOT NULL,
        property varchar(128) DEFAULT ''::character varying NOT NULL,
        delta int8 DEFAULT '0'::bigint NOT NULL,
        value text NOT NULL,
        CONSTRAINT idx_29663_primary PRIMARY KEY (sid, name, property, delta)
);
CREATE INDEX idx_29663_sid_webform_id ON webform_submission_data USING btree (sid, webform_id);
CREATE INDEX idx_29663_webform_id ON webform_submission_data USING btree (webform_id);

CREATE TABLE IF NOT EXISTS db.locales_location (
	lid bigserial NOT NULL,
	sid int8 NOT NULL,
	\"type\" varchar(50) DEFAULT ''::character varying NOT NULL,
	\"name\" varchar(255) DEFAULT ''::character varying NOT NULL,
	\"version\" varchar(20) DEFAULT 'none'::character varying NOT NULL,
	CONSTRAINT idx_28383_primary PRIMARY KEY (lid)
);
CREATE INDEX idx_28383_string_type ON db.locales_location USING btree (sid, type);
CREATE INDEX idx_28383_type_name ON db.locales_location USING btree (type, name);
    ";

        // Executar o script SQL
        $pdo->exec($sql);

        echo "Tabela e índices criados com sucesso!";
} catch (PDOException $e) {
        echo "Erro ao criar tabela e índices: " . $e->getMessage();
}

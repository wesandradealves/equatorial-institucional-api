# README

## Configuração e Uso do Projeto Drupal Institucional

Este documento fornece as instruções necessárias para configurar e trabalhar com o projeto Drupal Institucional da Equatorial usando o Git via SSH.

### 1. Clonando o Repositório Principal

Primeiro, clone o repositório principal do projeto:

```bash
git clone git@repositorio.equatorial.corp:equatorial/site-institucional/base-drupal.git
```

### 2. Acessando o Diretório do Projeto

Entre no diretório do projeto clonado:

```bash
cd base-drupal
```

### 3. Atualizando o Usuário do Projeto

Configure o usuário Git localmente para o projeto:

```bash
git config --local user.name "seu_nome (Sysmanager)" --replace-all
git config --local user.email seu_user@eqtlcontratada.com.br --replace-all
```

Substitua `seu_nome` e `seu_user` com seu nome e e-mail corporativo.

### 4. Adicionando as Outras Origens do Projeto

Adicione as origens remotas correspondentes a cada estado:

```bash
git remote add maranhao git@repositorio.equatorial.corp:equatorial/site-institucional/maranhao/maranhao-drupal.git
git remote add alagoas git@repositorio.equatorial.corp:equatorial/site-institucional/alagoas/alagoas-drupal.git
git remote add amapa git@repositorio.equatorial.corp:equatorial/site-institucional/amapa/amapa-drupal.git
git remote add goias git@repositorio.equatorial.corp:equatorial/site-institucional/goias/goias-drupal.git
git remote add para git@repositorio.equatorial.corp:equatorial/site-institucional/para/para-drupal.git
git remote add piaui git@repositorio.equatorial.corp:equatorial/site-institucional/piaui/piaui-drupal.git
git remote add rio-grande-do-sul git@repositorio.equatorial.corp:equatorial/site-institucional/rs/rio-grande-do-sul-drupal.git
```

### 5. Atualizando as Origens Remotas

Atualize todas as origens remotas para garantir que você tenha as últimas atualizações de cada repositório:

```bash
git fetch --all
```

### 6. Sincronizando os Repositórios

Você pode realizar o `git pull` de qualquer origem adicionada ao projeto. No entanto, para simplificar o processo, foram criados scripts no Composer para facilitar essa tarefa.

#### Para Sincronizar Individualmente

Para sincronizar individualmente com cada repositório, execute um dos comandos abaixo:

```bash
composer push-alagoas
composer push-amapa
composer push-goias
composer push-maranhao
composer push-para
composer push-piaui
composer push-rio-grande-do-sul
```

#### Para Sincronizar Todos os Repositórios

Para atualizar todos os repositórios de uma só vez, execute o comando:

```bash
composer push-all-repos
```

### Considerações Finais

Certifique-se de que você possui acesso SSH configurado corretamente para todos os repositórios e que as chaves SSH estão devidamente registradas no servidor Git da Equatorial.

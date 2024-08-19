Aqui está o README atualizado para uso com HTTPS em vez de SSH:

---

# README

## Configuração e Uso do Projeto Drupal Institucional

Este documento fornece as instruções necessárias para configurar e trabalhar com o projeto Drupal Institucional da Equatorial usando o Git via HTTPS.

### 1. Clonando o Repositório Principal

Primeiro, clone o repositório principal do projeto:

```bash
git clone https://repositorio.equatorial.corp/equatorial/site-institucional/base-drupal.git
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
git remote add maranhao https://repositorio.equatorial.corp/equatorial/site-institucional/maranhao/maranhao-drupal.git
git remote add alagoas https://repositorio.equatorial.corp/equatorial/site-institucional/alagoas/alagoas-drupal.git
git remote add amapa https://repositorio.equatorial.corp/equatorial/site-institucional/amapa/amapa-drupal.git
git remote add goias https://repositorio.equatorial.corp/equatorial/site-institucional/goias/goias-drupal.git
git remote add para https://repositorio.equatorial.corp/equatorial/site-institucional/para/para-drupal.git
git remote add piaui https://repositorio.equatorial.corp/equatorial/site-institucional/piaui/piaui-drupal.git
git remote add rio-grande-do-sul https://repositorio.equatorial.corp/equatorial/site-institucional/rs/rio-grande-do-sul-drupal.git
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

Certifique-se de que você possui as credenciais de acesso ao Git via HTTPS configuradas corretamente, para que os comandos funcionem sem problemas. Caso encontre dificuldades, revise suas configurações de autenticação e permissões para o repositório.

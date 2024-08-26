# Fluxo de Trabalho Git

Este documento descreve o fluxo de trabalho Git para o repositório [base-drupal](https://repositorio.equatorial.corp/equatorial/site-institucional/base-drupal). Siga as etapas abaixo para garantir a consistência e a qualidade do processo de desenvolvimento.

## 1. Configuração Inicial

Antes de começar, certifique-se de seguir as instruções do arquivo `readme/INICIANDO_SSH.md` para configurar o acesso SSH ao repositório.

## 2. Atualização da Branch de Base

1. Navegue até o repositório local.
2. Execute o comando para atualizar a branch `develop`:
   ```bash
   git pull origin develop
   ```

## 3. Criação de Branches de Desenvolvimento

1. Crie uma nova branch de desenvolvimento seguindo as convenções descritas no arquivo `readme/GIT_CONVENCOES.md`.
2. Exemplo:
   ```bash
   git checkout -b feature/nome-da-feature
   ```

## 4. Merge Request para a Branch Develop

1. Após concluir o desenvolvimento, abra um Merge Request conforme as instruções no arquivo `readme/MERGE_REQUEST.md`.
2. Aguarde a aprovação e o merge na branch `develop`.

## 5. Publicação no Ambiente de Desenvolvimento

1. Após o merge na branch `develop`, a versão será publicada automaticamente no ambiente de desenvolvimento.
2. Verifique se tudo está funcionando corretamente.

## 6. Atualização de Versão (Se Necessário)

1. Caso seja necessária uma atualização de versão, siga as instruções no arquivo `readme/ATUALIZACAO_DE_VERSAO.md`.
2. Execute os comandos necessários:
   ```bash
   npm run update-version
   ```

## 7. Merge Request para a Branch Release

1. Faça um push da branch `develop`:
   ```bash
   git push origin develop
   ```
2. Abra um Merge Request da branch `develop` para a branch `release`, seguindo as instruções no arquivo `readme/MERGE_REQUEST.md`.

## 8. Publicação no Ambiente de QA

1. Após o Merge Request para a branch `release`, a pipeline será executada automaticamente e a branch `release` será publicada no ambiente de QA.
2. Após a homologação da versão, faça as correções necessárias, se aplicável.

## 9. Merge Request para a Branch Main

1. Abra um Merge Request da branch `release` para a branch `main`, conforme descrito no arquivo `readme/MERGE_REQUEST.md`.
2. Após a conclusão do Merge Request, a versão será publicada no ambiente SHADOW de produção.

## 10. Preparação para Produção

1. Faça um pull da branch `main`:
   ```bash
   git pull origin main
   ```
2. Execute o commit de promoção de versão:
   ```bash
   git commit -am '-release=<versao-a-ser-promovida-para-producao>' --allow-empty
   ```
   Exemplo:
   ```bash
   git commit -am '-release=0.1.8' --allow-empty
   ```
3. Efetue o push e o merge na branch `main`.

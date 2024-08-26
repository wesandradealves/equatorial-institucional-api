# Documento de Nomenclatura de Repositórios Git

## 1. Objetivo

Este documento define o padrão de nomenclatura e boas práticas para commits, branches e tags nos repositórios Git, visando manter a consistência, clareza e rastreabilidade do histórico de versões. Este documento adota o padrão **Conventional Commits** como referência.

## 2. Convenções para Commits

### 2.1 Formato

Os commits devem seguir o formato abaixo:

```
<tipo>(<escopo opcional>): <descrição sucinta>
```

#### 2.1.1 Tipos de Commits

- **feat**: Adição de uma nova funcionalidade ao código.
- **fix**: Correção de bugs.
- **docs**: Alterações na documentação, como alterações no README ou comentários de código.
- **style**: Alterações que não afetam o significado do código (espaços em branco, formatação, ponto e vírgula, etc).
- **refactor**: Alteração de código que não corrige um bug nem adiciona uma funcionalidade.
- **perf**: Alterações no código que melhoram a performance.
- **test**: Adição ou correção de testes.
- **build**: Alterações que afetam o sistema de build ou dependências externas.
- **ci**: Alterações em arquivos de configuração e scripts de CI (Integração Contínua).
- **chore**: Atualizações de tarefas rotineiras, que não impactam o código funcional.
- **revert**: Reversão de um commit anterior.

#### 2.1.2 Escopo

O escopo é opcional, mas deve ser usado para contextualizar a mudança. Por exemplo, para um commit que altera uma API de autenticação, poderia ser usado o seguinte:

```
feat(auth): adicionar suporte para OAuth2
```

#### 2.1.3 Descrição

A descrição deve ser sucinta, informativa e escrita no imperativo. Exemplos:

- `feat(user): adicionar função de reset de senha`
- `fix(api): corrigir bug no endpoint de login`
- `docs(readme): atualizar instruções de configuração`

### 2.2 Exemplos

- `feat(user): adicionar campo de telefone ao perfil`
- `fix(navbar): corrigir problema de alinhamento no IE11`
- `refactor(modal): simplificar lógica de fechamento`
- `docs(api): documentar novo endpoint /users`

## 3. Convenções para Branches

### 3.1 Formato de Nomenclatura de Branches

As branches devem seguir o seguinte formato:

```
<tipo>/<descrição-resumida>
```

#### 3.1.1 Tipos de Branches

- **feature/**: Novas funcionalidades.
- **bugfix/**: Correções de bugs antes de uma release.
- **hotfix/**: Correções críticas após uma release.

- **experiment/**: Branches experimentais ou protótipos.

#### 3.1.2 Exemplo de Nomenclatura de Branches

- `feature/adicionar-autenticacao-oauth`
- `bugfix/corrigir-alinhamento-navbar`
- `hotfix/corrigir-erros-de-producao`

## 4. Convenções para Tags

### 4.1 Formato de Tags

As tags devem seguir o formato semântico de versionamento (semver):

```
v<MAJOR>.<MINOR>.<PATCH>
```

- **MAJOR**: Mudanças incompatíveis na API.
- **MINOR**: Funcionalidades retrocompatíveis.
- **PATCH**: Correções retrocompatíveis.

### 4.2 Exemplo de Tags

- `v1.0.0`: Primeira versão estável.
- `v1.1.0`: Adicionada nova funcionalidade de autenticação.
- `v1.1.1`: Corrigido bug na funcionalidade de autenticação.

## 5. Boas Práticas

- Mantenha as mensagens de commit claras e concisas.
- Commit com frequência para garantir que o histórico seja granular e fácil de entender.
- Evite commits muito grandes que incluem várias mudanças diferentes.
- Utilize Pull Requests para todas as mudanças e siga o processo de revisão de código.

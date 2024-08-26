# Manual de Atualização de Versão

## 1. Objetivo

Este manual tem como objetivo fornecer um guia passo a passo para a atualização da versão do projeto utilizando o comando `npm run update-version`. Ele detalha as etapas necessárias para garantir que a versão seja atualizada corretamente e refletida no repositório remoto.

## 2. Passo a Passo para Atualização de Versão

### 2.1 Pré-requisitos

Antes de iniciar o processo de atualização de versão, certifique-se de que:

- Você tem permissão para realizar operações de versão no repositório.
- Sua branch `develop` está atualizada com a última versão do repositório remoto.

### 2.2 Passos Iniciais

1. **Atualize a Branch Develop**:

   - Certifique-se de que sua branch `develop` está atualizada com o repositório remoto.

   ```bash
   git checkout develop
   git fetch origin
   git pull origin develop
   ```

2. **Instale as Dependências**:

   - Antes de atualizar a versão, é crucial garantir que todas as dependências do projeto estejam instaladas e atualizadas. Execute o seguinte comando:

   ```bash
   npm install
   ```

### 2.3 Executando a Atualização de Versão

1. **Atualize a Versão do Projeto**:

   - Utilize o comando `npm run update-version` para atualizar a versão do projeto. Esse comando ajustará a versão conforme a convenção semântica estabelecida no projeto (major, minor, patch).

   ```bash
   npm run update-version
   ```

   - Esse comando irá automaticamente atualizar o número da versão nos arquivos apropriados (como `package.json`), gerar as tags necessárias e possivelmente criar um commit com essas mudanças.

### 2.4 Publicação das Alterações

1. **Realize o Push da Branch Develop**:

   - Após a atualização da versão, envie as mudanças para o repositório remoto. Isso garantirá que a versão atualizada esteja disponível para todos os colaboradores.

   ```bash
   git push origin develop
   ```

2. **Verifique o Push e as Tags**:
   - Confirme que o push foi realizado com sucesso e que as tags associadas à nova versão foram criadas e enviadas corretamente para o repositório remoto.

### 2.5 Considerações Finais

- **Comunicação**: Após a atualização da versão e o push das mudanças, comunique a equipe sobre a nova versão, especialmente se houverem mudanças significativas.
- **Documentação**: Atualize a documentação do projeto, se necessário, para refletir a nova versão.

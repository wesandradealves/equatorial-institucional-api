# Manual de Abertura de Merge Request (MR)

## 1. Objetivo

Este manual tem como objetivo fornecer um guia passo a passo para a criação e submissão de Merge Requests (MRs) em nossos repositórios Git, garantindo um processo de revisão de código eficiente e colaborativo.

## 2. Pré-requisitos

Antes de abrir um Merge Request, certifique-se de que:

- O código está completo, testado e atende aos requisitos do ticket/issue.
- Todos os testes foram executados e passaram com sucesso.
- A branch está atualizada com a `main` (ou a branch de destino).
- O código segue os padrões de estilo e linting definidos no projeto.
- A documentação (se aplicável) foi atualizada para refletir as mudanças.

## 3. Passo a Passo para Abertura de um Merge Request

### 3.1 Sincronize a Branch de Destino

Antes de abrir um MR, sincronize sua branch com a branch de destino para evitar conflitos:

```bash
git checkout <sua-branch>
git fetch origin
git merge origin/<sua-branch-a-ser-mergeada>
```

### 3.2 Crie o Merge Request

1. **Acesse o repositório** no GitLab/GitHub ou outra plataforma de controle de versão.
2. **Navegue até a seção de Merge Requests** e clique em "New Merge Request" (ou equivalente).
3. **Selecione a branch de origem e a branch de destino**:
   - Origem: A branch em que você trabalhou.
   - Destino: Normalmente `main`, `develop`, ou outra branch específica do fluxo de trabalho.

### 3.3 Como Criar o Título e a Mensagem do Merge Request

#### 3.3.1 Criando o Título

O título do Merge Request deve ser claro, descritivo e seguir o padrão dos **Conventional Commits**. Utilize o seguinte formato:

```
<tipo>(<escopo opcional>): <descrição sucinta>
```

**Exemplos de Títulos:**

- `feat(user): adicionar reset de senha`
- `fix(navbar): corrigir problema de alinhamento no IE11`
- `refactor(auth): simplificar lógica de verificação de tokens`

**Recomendações:**

- **Use o tipo adequado**: Escolha entre `feat`, `fix`, `refactor`, etc., para refletir a natureza da mudança.
- **Seja específico**: O escopo deve ser opcional, mas, quando usado, ajuda a contextualizar a mudança.
- **Descrição sucinta**: A descrição deve ser curta e descrever claramente a funcionalidade ou correção.

#### 3.3.2 Criando a Mensagem (Descrição)

Na descrição do Merge Request, adicione detalhes importantes que ajudem os revisores a entender o contexto e o impacto das mudanças. Inclua:

- **Resumo das mudanças**: Explique brevemente o que foi alterado e por quê.
- **Tickets/issues relacionados**: Referencie o número do ticket/issue resolvido, por exemplo: `Resolves #123`.
- **Impacto das mudanças**: Descreva o impacto esperado das mudanças no sistema.
- **Passos para testar**: Inclua instruções claras sobre como testar a mudança.
- **Screenshots (opcional)**: Se aplicável, adicione capturas de tela das mudanças visuais.

**Exemplo de Mensagem de MR:**

```
### O que foi feito:
- Adicionado um novo endpoint para o reset de senha na API de usuários.
- Atualizada a documentação da API para incluir o novo endpoint.
- Corrigido um bug no processo de verificação de e-mail.

### Relacionado a:
- Resolves #456

### Como testar:
1. Acesse a página de login e clique em "Esqueci minha senha".
2. Insira o e-mail registrado e verifique se o link de reset é enviado corretamente.
3. Tente resetar a senha com o link enviado e verifique se o processo é concluído sem erros.

### Impacto:
- A funcionalidade de reset de senha está disponível para todos os usuários.
- Possíveis impactos nas áreas de autenticação, já que a lógica foi ajustada.
```

### 3.4 Atribua Revisores

1. **Escolha revisores**: Selecione pelo menos um revisor que tenha conhecimento no assunto abordado no MR.
2. **Adicione labels e milestones (opcional)**: Se o projeto usar labels ou milestones, adicione-as para melhor organização e rastreamento.

### 3.5 Envie o Merge Request

Clique em "Create Merge Request" para submeter o MR para revisão.

## 4. Pós-submissão

### 4.1 Acompanhamento da Revisão

- **Interaja com os revisores**: Responda às perguntas, faça ajustes solicitados e participe ativamente no processo de revisão.
- **Atualize o MR se necessário**: Faça as alterações solicitadas pelos revisores e atualize o MR com novos commits.

### 4.2 Resolução de Conflitos

- Se surgirem conflitos durante o processo de revisão, resolva-os localmente e force push na branch do MR.

### 4.3 Aprovação e Merge

- Após a aprovação de todos os revisores, **confirme o merge** se você tiver permissão para isso. Caso contrário, notifique quem tem a permissão para realizar o merge.

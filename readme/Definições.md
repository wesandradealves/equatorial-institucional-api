# PADRÃO DE DESENVOLVIMENTO E QUALIDADE
Aqui está documentado as definições de padrão e qualidade de entrega elaboradas em conjunto com o time.



# Índice
- [Voltar](../README.md)
- [Definições de entrega das aplicações](#Definições-de-entrega-das-aplicações)
  - [React](#React)
  - [Drupal](#Drupal)
- [Idiomas definidos](#Idiomas)
  - [Programação](#Programação)
  - [Estrutura](#Estrutura)
  - [Documentação](#Documentação)
- [Convenção de Nomenclatura](#Convenção-de-Nomenclatura)
  - [Classes](#Classes)
  - [Funções](#Funções)
  - [Variáveis](#Variáveis)
  - [Constantes e variáveis de ambiente](#Constantes-e-variáveis-de-ambiente)
  - [Pastas e arquivos](#Pastas-e_arquivos)
- [Versionamento](#Versionamento)
  - [Estrutura nome da Branch](#Estrutura-nome-da-Branch)
  - [Descrição do commit](#Descrição_do-commit)
  - [Branches Chaves](#Branches-Chaves)
  - [GIT Flow](#GIT-Flow)
  - [Fluxo de Branch por Estado/UF](#Fluxo-de-Branch-por-Estado/UF)
- [Design no FIGMA](#Design no FIGMA)



# Definições de entrega das aplicações

## React
Para garantir a qualidade de entrega e padrão de requisitos esperados, deve-se seguir a lista a baixo:
- Responsividade (mobile first)
- Storybook de componentes
- Seguir a risca o FIGMA
- Garantir boas práticas ( `nm run lint` )
- Análise e testar a build antes do merge ( `npm run build` )
- Verificar possíveis problemas de merge após os passos acima
- Descrição da entrega no ADO com evidências
- Caminho feliz funcionando

## Drupal
Para garantir a qualidade de entrega e padrão de requisitos esperados, deve-se seguir a lista a baixo:
- Api no ambiente funcionando
- Swagger no ambiente
- Collection no Postman (Com finalidade do front/qa consumir)
- Descrição da entrega no ADO com evidências
- Caminho feliz funcionando



# Idiomas
Idiomas que devem ser usados na construção de código, comentários e descrições.

## Programação
| Item        | Idioma     |
| :---------: | :--------: |
| Classes     | Inglês     |
| Funções     | Inglês     |
| Variáveis   | Inglês     |
| Comentários | Português  |
| Descrições  | Português  |

## Estrutura
| Item     | Idioma |
| :------: | :----: |
| Pastas   | Inglês |
| Arquivos | Inglês |

## Documentação
| Item          | Idioma    |
| :-----------: | :-------: |
| Wiki          | Português |
| ReadeMe       | Português |
| Documentações | Português |
| Manuais       | Português |



# Convenção de Nomenclatura
Definições da padronização para criação de classes, funções, variáveis, pastas e arquivos.

## Classes
Pascal Case (PascalCase): Semelhante ao Camel Case, mas a primeira letra da primeira palavra também é maiúscula.
> Exemplo: MinhaClasse()

## Funções
Camel Case (camelCase): A primeira letra da primeira palavra é minúscula, mas a primeira letra de cada palavra subsequente é maiúscula.
> Exemplo: getClient()

## Variáveis
Snake Case (snake_case): Todas as letras são minúsculas e as palavras são separadas por sublinhados.
> Exemplo: minha_variavel

## Constantes e variáveis de ambiente
Constant Case (CONSTANT_CASE): Todas as letras são maiúsculas e as palavras são separadas por sublinhados.
> Exemplo: MINHA_VARIAVEL

## Pastas e arquivos
Snake Case (snake_case): Todas as letras são minúsculas e as palavras são separadas por sublinhados.
> Exemplo: minha_variavel



# Versionamento
Definições para criação de branches e clones.

## Estrutura nome da Branch
TIPO_ATIVIDADE/CÓDIGO_ÚNICO-TÍTULO_RESUMIDO
A estrutura será toda minúscula e sem acentuação.
Tipos de atividades
- Feature: Novas funcionalidades definidas na sprint;
- Bugfix: Correção de feature que estão em produção e entraram na sprint atual;
- Hotfix: Correção que vai direto para o ambiente produtivo.

### Exemplos
- feature/123-menu_geral_institucional
- feature/124-hero_home
- bugfix/125-rodape_geral_institucional
- hotfix/126-menu_responsivo
- feature/3193-criar_estrutura_da_aplicacao_equatorial

## Descrição do commit
No commit deve conter uma chave ou chaves para identificar qual o tipo do mesmo, além de uma descrição do motivo do commit e ações realizadas.

### Chaves
- [ADD]: Novos arquivos, funções, classes, tudo que não existia e passará a existir por conta do commit;
- [DEL]: Tudo que está sendo retirado do código ou repositório;
- [MOD]: Tudo que está sendo alterando no código ou repositório.

### Exemplo
> [ADD] Função que trás a segunda via da fatura de um cliente especifico.

## Branches Chaves
### Main – Produção
Essa Branch é a responsável pelo código que estará no ambiente de produção e o deploy do mesmo.
### Hml – Homologação
Branch responsável para o deploy do ambiente de homologação.
### Release X
Essa é a Branch que será centralizado todas as feature realizadas e validadas pela sprint para realizar o deploy em produção em apenas uma entrega.

## GIT Flow
1. 	Criar clone da Branch Main, nomeando seguindo a estrutura definida;
2.	Desenvolver a atividade definida e realizando os commits necessários, apontando para a infraestrutura do ambiente DEV;
3.	Validar no ambiente local conectado com a infraestrutura do ambiente DEV;
4.	Criar pull request para hml;
5.	Enviar para code review do LT;
6.	Sendo aprovado, será feito o deploy para HML;
7.	Homologar a atividade (QA);
8.	Liberar para validação da área de negócio;
9.	Criar pull request para release X;
10.	Enviar para code review do LT;
11.	Seguir processo de RDM/GMUD;
Obs: Para correções de feature que não estão em produção deve seguir do passo 2 em diante.

## Fluxo de Branch por Estado/UF
- Cada aplicação front-end e back-endterá um repositório padrão;
- Cada estado terá um repositório para suas modificações especificas;
- Modificações que vão para todos os estados serão feitas no repositório padrão e enviado para os demais repositórios;
- Modificações especificas serão feita no repositório do estado ou estados;
- Atualmente existiram 8 repositórios para o front-end e mais 8 para back-end, um padrão e 7 outros para cada estado.



# Design no FIGMA
[Home Accenture](https://www.figma.com/design/duDiajEv2359OAbVX1DNbJ/[Entrega-Design]-Home-Institucional?node-id=1-7&t=xTU2DokvBDg0RkWd-0)

[Templates Accenture](https://www.figma.com/design/LoC2MJvVh7vo7UaMUbZJGf/[Entrega-Design]-Templates-Institucional-1?node-id=1-11&t=825dOcBDJ3IGGb2d-0)

[Páginas de transparência](https://www.figma.com/design/krqgdQ4RmFRkOt7O6F56ES/Site-institucional?node-id=369-5173&t=aP8MGj0ftUHkk2xm-4)

[Página sobre](https://www.figma.com/proto/krqgdQ4RmFRkOt7O6F56ES/Site-institucional?page-id=75%3A2005&node-id=75-5828&viewport=709%2C490%2C0.1&t=1Cmm7accUKV8WhPZ-1&scaling=min-zoom&content-scaling=fixed&starting-point-node-id=75%3A3004)

[Mapa do site](https://www.figma.com/design/qOXGhWN8vFL8CDvFe2hzHy/[Entrega-Design]-Mapa-do-site?node-id=1251-8256&t=A4fA0hLDCHSEX39p-0)

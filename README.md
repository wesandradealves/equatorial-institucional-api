# Institucional Drupal
Este é o projeto é a aplicação back-end do portal Institucional Equatorial com a finalidade de realizar a gestão de conteúdo e fornecer APIs para o front-end em React. 

# [PADRÃO DE DESENVOLVIMENTO E QUALIDADE](README-Definições.md)

# Fluxo da Aplicação
- Cada estado terá seu par te aplicações, uma front-ende outra back-end, ambas dentro do Open Shift;
- CadaDrupalterá seu banco de dados que não estará dentro da máquina Open Shift;
- O Drupal terá duas rotas, uma para o front-end consumir os dados via API e outra para o painel administrativo do CMS;
- Atualmente teremos 14 aplicações, 7 para back-end, uma por estado e outras 7 de front-end, uma para cada estado.
![Fluxo da aplicação](/fluxo-aplica.png)


#Subir a aplicação no ambiente local
Antes de começar, você precisa criar um arquivo `.env` na pasta `web`.

## Configuração Inicial

1. Crie um novo arquivo chamado `.env`.

```bash
cp .env.example .env
```

2. Siga os passos do arquivo [DOCKER.md](/readme/DOCKER.md)

### Suporte

Se você encontrar algum problema ao usar este repositório, por favor, abra uma issue.

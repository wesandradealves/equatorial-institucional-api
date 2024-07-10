# README

## Configuração do Ambiente Docker com Drupal, MariaDB e phpMyAdmin

Este repositório contém um arquivo `docker-compose.yml` que define três serviços: Drupal, MariaDB e phpMyAdmin.

### Pré-requisitos

- Docker instalado na sua máquina. Se você ainda não tem, pode baixar [aqui](https://www.docker.com/products/docker-desktop).
- Docker Compose instalado na sua máquina. Ele geralmente vem com a instalação do Docker Desktop.

### Como usar

1. Clone este repositório para a sua máquina local.

2. Navegue até o diretório do repositório clonado.

3. Execute o seguinte comando para iniciar os containers:

```bash
docker-compose up
```

4. Agora você deve ser capaz de acessar o Drupal em `http://localhost:8080`, o phpMyAdmin em `http://localhost:8081` e o MariaDB na porta 3306 do seu localhost.

### Serviços

- **Drupal**: Um CMS popular para desenvolvimento web. Neste projeto, ele está sendo construído a partir de um Dockerfile no diretório atual.

- **MariaDB**: Um sistema de gerenciamento de banco de dados relacional. Neste projeto, estamos usando a imagem `mariadb:10.5`.

- **phpMyAdmin**: Uma ferramenta de administração de banco de dados MySQL baseada na web. Neste projeto, estamos usando a imagem `phpmyadmin/phpmyadmin`.

Todos os três serviços estão na mesma rede Docker, `drupal_network`, permitindo que eles se comuniquem entre si.

### Variáveis de Ambiente

As variáveis de ambiente para cada serviço estão definidas no arquivo `docker-compose.yml`. Você pode alterá-las conforme necessário para o seu projeto.

### Parando os Serviços

Para parar os serviços, pressione `Ctrl+C` no terminal onde você executou `docker-compose up`. Para parar e remover os containers, a rede e os volumes definidos pelo `docker-compose.yml`, execute o seguinte comando:

```bash
docker-compose down
```

### Suporte

Se você encontrar algum problema ao usar este repositório, por favor, abra uma issue.

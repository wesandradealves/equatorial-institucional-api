# Institucional Drupal
Este é o projeto é a aplicação back-end do portal Institucional Equatorial com a finalidade de realizar a gestão de conteúdo e fornecer APIs para o front-end em React. 


# [PADRÃO DE DESENVOLVIMENTO E QUALIDADE](/readme/Definitions.md)


# Fluxo da Aplicação
- Cada estado terá seu par te aplicações, uma front-ende outra back-end, ambas dentro do Open Shift;
- CadaDrupalterá seu banco de dados que não estará dentro da máquina Open Shift;
- O Drupal terá duas rotas, uma para o front-end consumir os dados via API e outra para o painel administrativo do CMS;
- Atualmente teremos 14 aplicações, 7 para back-end, uma por estado e outras 7 de front-end, uma para cada estado.

![Fluxo da aplicação](/readme/app_flow.png)

# Drupal Installation Guide

This guide will walk you through the steps to install and set up a Drupal project using DDEV.

## Prerequisites

- Git
- PHP 8.0+
- Drupal10
- DDEV (installation instructions below)
- Composer

## Steps

### 1. Clone the Repository

First, clone the repository from IBM Cloud:

```sh
git clone https://us-south.git.cloud.ibm.com/equatorial-one/institucional-drupal
cd institucional-drupal
```

### 2. Switch to the Develop Branch

```sh
git checkout develop
```

### 3. Install DDEV

Follow the instructions to install DDEV on your device: [DDEV Installation Guide](https://ddev.readthedocs.io/en/stable/users/install/ddev-installation/#__tabbed_1_2)

### 4. Configure DDEV

At the root of the cloned repository, run the following command to configure DDEV:

```sh
ddev config
```

Follow the instructions:

- Preferably choose to install on the root.
- Select `drupal10` as the default config.
- Set a name for the project.

This will create a folder called `.ddev`.

### 5. Update DDEV Configuration

Locate the file `.ddev/config.yaml` and scroll down to lines 43 and 44 (or around there). Look for `router_http_port` and `router_https_port`. Uncomment the lines and change the ports to avoid conflicts:

```yaml
router_http_port: 5353  # Port to be used for http (defaults to global configuration, usually 80)
router_https_port: 444  # Port for https (defaults to global configuration, usually 443)
```

### 6. Install Dependencies

At the root of the project, run:

```sh
composer install
```

### 7. Start the DDEV Project

Start the project with:

```sh
ddev start
```

This will start a blank Drupal project. Access the given URL and proceed with the installation of the blank Drupal project.

### 8. Enable the Backup and Migrate Module

Once your Drupal instance is installed and running, enable the `backup_migrate` module:

```sh
ddev drush en backup_migrate
```

### 9. Access the Admin Screen

To access the admin screen, either go to `/user/` URL or run the following command to generate a login URL:

```sh
ddev drush uli
```

### 10. Restore Backup

Go to the Backup and Migrate restore menu at `/admin/config/development/backup_migrate/restore` and upload the current backup.

### 11. Unzip the Files Folder

Unzip the files folder in `/sites/default/` and check if it has unzipped correctly.

---

By following these steps, you should have a Drupal project set up and running with the necessary configurations. If you encounter any issues, refer to the DDEV and Drupal documentation for further assistance.

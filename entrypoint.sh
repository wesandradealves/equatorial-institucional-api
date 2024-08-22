#!/bin/sh

# Executar comandos Drush
drush cim -y
drush cex -y
drush updb -y
drush cr
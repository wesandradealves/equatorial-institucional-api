#!/bin/sh

# Executar comandos Drush
drush cr
drush updb -y
drush cex -y
drush cr

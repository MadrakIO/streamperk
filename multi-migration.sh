#!/bin/bash
CONFIGURATION_FILES="./app/config/multisite/*.yml"
for f in $CONFIGURATION_FILES
do
    filename=$(basename "$f")
    environment="${filename%.*}"

    echo "Running migrations for $environment"
    app/console doctrine:migrations:migrate --env=$environment
done

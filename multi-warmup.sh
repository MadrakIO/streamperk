#!/bin/bash
CONFIGURATION_FILES="./app/config/multisite/*.yml"
for f in $CONFIGURATION_FILES
do
    filename=$(basename "$f")
    environment="${filename%.*}"

    echo "Running cache warmup for $environment"
    app/console cache:warmup --env=$environment
done
